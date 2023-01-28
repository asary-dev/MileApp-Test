<?php

namespace App\Services;

use App\Models\Transaction;
use App\Services\ConnoteService;
use App\Services\KoliDataService;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// use Jenssegers\Mongodb\S;

class TransactionService
{

    protected $transaction;
    protected $connoteService;
    protected $koliDataService;

    public function __construct(Transaction $transaction, ConnoteService $connoteService, KoliDataService $koliDataService)
    {
        $this->transaction = $transaction;
        $this->connoteService = $connoteService;
        $this->koliDataService = $koliDataService;
    }

    public function getAllTransactions(Request $requests)
    {
        return $this->transaction->all();
    }

    public function getOneById($id)
    {
        return $this->transaction->findOrFail($id);
    }

    public function saveTransaction($input)
    {
        try {
            $createdTransaction = new $this->transaction;

            $createdTransaction->fill($input);
            $createdTransaction->save();

            $connote = $input['connote'];
            $connote['transaction_id'] = $createdTransaction->id;
            $createdConnote = $this->connoteService->saveConnote($connote);
            $koliData = collect($input['koli_data'])->transform(function ($valueKoli, $key) use ($createdConnote) {
                $valueKoli['connote_id'] = $createdConnote['id'];

                // insert() does not create id
                $valueKoli['id'] = Str::uuid()->toString();
                return $valueKoli;
            });

            $this->koliDataService->bulkSaveKoliData($koliData->toArray());

            return $createdTransaction;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function updateTransaction($input, $id)
    {
        try {
            $createdTransaction = $this->transaction::where('id', $id)->update($input);

            $connote = $input['connote'];
            $this->connoteService->updateConnote($connote, $connote['id']);

            $koliData = collect($input['koli_data'])->transform(function ($valueKoli, $key) use ($connote) {
                $valueKoli['connote_id'] = $connote['id'];

                // insert() does not create id
                if (!array_key_exists("id", $valueKoli)) {
                    $valueKoli['id'] = Str::uuid()->toString();
                }
                return $valueKoli;
            });

            $this->koliDataService->bulkUpdateKoliData($koliData->toArray());

            return $createdTransaction;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function deleteTransaction($id)
    {
        try {
            $transaction = $this->transaction->find($id);
            if ($transaction->connote) {
                if ($transaction->connote->koliData) {
                    $transaction->connote->koliData()->delete();
                }
                $transaction->connote()->delete();
            }
            $transaction->delete();
            return true;
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public function softDeleteTransaction($id)
    {
    }

    public function recoverTransaction()
    {
    }
}
