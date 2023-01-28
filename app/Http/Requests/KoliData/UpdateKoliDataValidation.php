<?php

namespace App\Http\Requests\Connote;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class UpdateConnoteValidation extends Validation
{
    public static $rules = [
        "id" => ['required', 'string', 'max:255', 'exists:mongodb.koli_data,id'],
        "connote_id" => ['required', 'string', 'max:255', 'exists:mongodb.connotes,id'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        static::$rules = array_merge(static::$rules, CreateConnoteValidation::$rules);
        $request->merge(['id' => $request->id]);
        parent::__construct($request, $relations);
    }
}
