<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class CreateTransactionValidation extends Validation
{

    public static $rules = [
        "customer_name" => ['required', 'string', 'max:255'],
        "customer_code" => ['required', 'string'],
        "transaction_amount" => ['required', 'numeric'],
        "transaction_discount" => ['required', 'numeric', 'max:100'],
        "transaction_additional_field" => ['nullable'],
        "transaction_payment_type" => ['required', 'numeric'],
        "transaction_state" => ['required', 'string'],
        "transaction_code" => ['required', 'string'],
        "transaction_order" => ['required', 'numeric'],
        "location_id" => ['required'],
        "organization_id" => ['required', 'numeric'],
        "transaction_payment_type_name" => ['required', 'string'],
        "transaction_cash_amount" => ['nullable', 'numeric'],
        "transaction_cash_change" => ['nullable', 'numeric'],

        "customer_attribute.sales_name" => ['required', 'string'],
        "customer_attribute.top" => ['required', 'string'],
        "customer_attribute.customer_type" => ['required', 'string'],

        "origin_data.customer_name" => ['required', 'string'],
        "origin_data.customer_address" => ['required', 'string'],
        "origin_data.customer_email" => ['nullable', 'string'],
        "origin_data.customer_phone" => ['required', 'string'],
        "origin_data.customer_address_detail" => ['nullable', 'string'],
        "origin_data.customer_zip_code" => ['required', 'string'],
        "origin_data.zone_code" => ['required', 'string'],
        "origin_data.organization_id" => ['required', 'numeric'],
        "origin_data.location_id" => ['required', 'string'],

        "destination_data.customer_name" => ['required', 'string'],
        "destination_data.customer_address" => ['required', 'string'],
        "destination_data.customer_email" => ['nullable', 'string'],
        "destination_data.customer_phone" => ['required', 'string'],
        "destination_data.customer_address_detail" => ['nullable', 'string'],
        "destination_data.customer_zip_code" => ['required', 'string'],
        "destination_data.zone_code" => ['required', 'string'],
        "destination_data.organization_id" => ['required', 'numeric'],
        "destination_data.location_id" => ['required', 'string'],

        "custom_field.*" => 'nullable',

        "current_location.name" => ['required', 'string', 'max:255'],
        "current_location.code" => ['required', 'string', 'max:255'],
        "current_location.type" => ['required', 'string', 'max:255'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        parent::__construct($request, $relations);
    }
}
