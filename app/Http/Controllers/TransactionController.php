<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\CreateTransactionCompleteValidation;
use App\Http\Requests\Transaction\PatchTransactionCompleteValidation;
use App\Http\Requests\Transaction\ReadByIDValidation;
use App\Http\Requests\Transaction\UpdateTransactionCompleteValidation;
use App\Services\ConnoteService;
use App\Services\TransactionService;
use App\Transformer\TransactionTransformer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;
    protected $connoteService;

    public function __construct(TransactionService $transactionService, ConnoteService $connoteService)
    {
        $this->transactionService = $transactionService;
        $this->connoteService = $connoteService;
    }

    public function index(Request $request)
    {
        try {
            $data = $this->transactionService->getAllTransactions($request);
            return response()->json([
                'status' => true,
                'data' => TransactionTransformer::all($data),
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $validation = new ReadByIDValidation($request);
            if (!$validation->status) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->message,
                ], 400);
            }

            $data = $this->transactionService->getOneById($id);
            return response()->json([
                'status' => true,
                'data' => TransactionTransformer::detail($data),
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validation = new CreateTransactionCompleteValidation($request);
            if (!$validation->status) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->message,
                ], 400);
            }

            $transaction = $this->transactionService->saveTransaction($validation->data);

            return response()->json([
                'status' => true,
                'message' => 'Successfully created.',
                'data' => TransactionTransformer::getByField($transaction, 'id'),
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $validation = new UpdateTransactionCompleteValidation($request);

            if (!$validation->status) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->message,
                ], 400);
            }

            $this->transactionService->updateTransaction($validation->data, $id);

            return response()->json([
                'status' => true,
                'message' => 'Successfully Updated.',
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function patch(Request $request, $id)
    {
        try {
            $validation = new PatchTransactionCompleteValidation($request);
            if (!$validation->status) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->message,
                ], 400);
            }

            $this->transactionService->updateTransaction($validation->data, $id);

            return response()->json([
                'status' => true,
                'message' => 'Successfully Updated.',
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $validation = new ReadByIDValidation($request);
            if (!$validation->status) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->message,
                ], 400);
            }

            $this->transactionService->deleteTransaction($id);

            return response()->json([
                'status' => true,
                'message' => 'Successfully Deleted.',
            ], 200);
        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
