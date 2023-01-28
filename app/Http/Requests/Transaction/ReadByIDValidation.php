<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class ReadByIDValidation extends Validation
{
    public static $rules = [
        "id" => ['required', 'string', 'max:255', 'exists:mongodb.transactions,id'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        $request->merge(['id' => $request->id]);
        parent::__construct($request, $relations);
    }
}
