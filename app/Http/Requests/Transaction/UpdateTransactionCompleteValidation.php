<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class UpdateTransactionCompleteValidation extends Validation
{
    public static $rules = [
        "id" => ['required', 'string', 'max:255', 'exists:mongodb.transactions,id'],
        "connote.id" => ['nullable', 'string'],
        "connote.transaction_id" => ['required', 'string', 'exists:mongodb.transactions,id'],
        "koli_data.*.connote_id" => ['nullable', 'string'],
        "koli_data.*.id" => ['nullable', 'string'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        static::$rules = array_merge(static::$rules, CreateTransactionCompleteValidation::$rules);
        $request->merge(['id' => $request->id]);
        parent::__construct($request, $relations);
    }
}
