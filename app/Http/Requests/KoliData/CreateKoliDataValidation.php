<?php

namespace App\Http\Requests\Connote;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class CreateKoliDataValidation extends Validation
{
    public static $rules = [
        "koli_length" => ['required', 'numeric'],
        "awb_url" => ['required', 'string'],
        "koli_chargeable_weight" => ['required', 'numeric'],
        "koli_width" => ['required', 'numeric'],
        "koli_surcharge" => ['nullable', 'array'],
        "koli_height" => ['nullable', 'numeric'],
        "koli_description" => ['required', 'string'],
        "koli_formula_id" => ['nullable', 'string'],
        "koli_volume" => ['required', 'numeric'],
        "koli_weight" => ['required', 'numeric'],
        "koli_custom_field.*" => ['nullable', 'string'],
        "koli_code" => ['nullable', 'string'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        parent::__construct($request, $relations);
    }
}
