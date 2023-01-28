<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class CreateTransactionCompleteValidation extends Validation
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

        "connote.connote_number" => ['required', 'numeric'],
        "connote.connote_service" => ['required', 'string'],
        "connote.connote_service_price" => ['required', 'numeric'],
        "connote.connote_amount" => ['required', 'numeric'],
        "connote.connote_code" => ['required', 'string'],
        "connote.connote_booking_code" => ['nullable', 'string'],
        "connote.connote_order" => ['required', 'numeric'],
        "connote.connote_state" => ['required', 'string'],
        "connote.connote_state_id" => ['required', 'numeric'],
        "connote.zone_code_from" => ['required', 'string'],
        "connote.zone_code_to" => ['required', 'string'],
        "connote.surcharge_amount" => ['nullable', 'string'],
        "connote.actual_weight" => ['required', 'numeric'],
        "connote.volume_weight" => ['required', 'numeric'],
        "connote.chargeable_weight" => ['required', 'numeric'],
        "connote.organization_id" => ['required', 'numeric'],
        "connote.location_id" => ['required', 'string'],
        "connote.connote_total_package" => ['required', 'numeric'],
        "connote.connote_surcharge_amount" => ['nullable', 'numeric'],
        "connote.connote_sla_day" => ['required', 'numeric'],
        "connote.location_name" => ['required', 'string'],
        "connote.location_type" => ['required', 'string'],
        "connote.source_tariff_db" => ['required', 'string'],
        "connote.id_source_tariff" => ['required', 'numeric'],
        "connote.pod" => ['nullable', 'string'],
        "connote.history" => ['nullable', 'array'],

        "koli_data.*" => ['required', 'array'],
        "koli_data.*.koli_length" => ['required', 'numeric'],
        "koli_data.*.awb_url" => ['required', 'string'],
        "koli_data.*.koli_chargeable_weight" => ['required', 'numeric'],
        "koli_data.*.koli_width" => ['required', 'numeric'],
        "koli_data.*.koli_surcharge" => ['nullable', 'array'],
        "koli_data.*.koli_height" => ['nullable', 'numeric'],
        "koli_data.*.koli_description" => ['required', 'string'],
        "koli_data.*.koli_formula_id" => ['nullable', 'string'],
        "koli_data.*.koli_volume" => ['required', 'numeric'],
        "koli_data.*.koli_weight" => ['required', 'numeric'],
        "koli_data.*.koli_custom_field.*" => ['nullable', 'string'],
        "koli_data.*.koli_code" => ['nullable', 'string'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        parent::__construct($request, $relations);
    }
}
