<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class PatchTransactionCompleteValidation extends Validation
{
    public static $rules = [
        "id" => ['required', 'string', 'max:255', 'exists:mongodb.transactions,id'],

        "customer_name" => ['nullable', 'string', 'max:255'],
        "customer_code" => ['nullable', 'string'],
        "transaction_amount" => ['nullable', 'numeric'],
        "transaction_discount" => ['nullable', 'numeric', 'max:100'],
        "transaction_additional_field" => ['nullable'],
        "transaction_payment_type" => ['nullable', 'numeric'],
        "transaction_state" => ['nullable', 'string'],
        "transaction_code" => ['nullable', 'string'],
        "transaction_order" => ['nullable', 'numeric'],
        "location_id" => ['nullable'],
        "organization_id" => ['nullable', 'numeric'],
        "transaction_payment_type_name" => ['nullable', 'string'],
        "transaction_cash_amount" => ['nullable', 'numeric'],
        "transaction_cash_change" => ['nullable', 'numeric'],

        "customer_attribute.sales_name" => ['nullable', 'string'],
        "customer_attribute.top" => ['nullable', 'string'],
        "customer_attribute.customer_type" => ['nullable', 'string'],

        "origin_data.customer_name" => ['nullable', 'string'],
        "origin_data.customer_address" => ['nullable', 'string'],
        "origin_data.customer_email" => ['nullable', 'string'],
        "origin_data.customer_phone" => ['nullable', 'string'],
        "origin_data.customer_address_detail" => ['nullable', 'string'],
        "origin_data.customer_zip_code" => ['nullable', 'string'],
        "origin_data.zone_code" => ['nullable', 'string'],
        "origin_data.organization_id" => ['nullable', 'numeric'],
        "origin_data.location_id" => ['nullable', 'string'],

        "destination_data.customer_name" => ['nullable', 'string'],
        "destination_data.customer_address" => ['nullable', 'string'],
        "destination_data.customer_email" => ['nullable', 'string'],
        "destination_data.customer_phone" => ['nullable', 'string'],
        "destination_data.customer_address_detail" => ['nullable', 'string'],
        "destination_data.customer_zip_code" => ['nullable', 'string'],
        "destination_data.zone_code" => ['nullable', 'string'],
        "destination_data.organization_id" => ['nullable', 'numeric'],
        "destination_data.location_id" => ['nullable', 'string'],

        "custom_field.*" => 'nullable',

        "current_location.name" => ['nullable', 'string', 'max:255'],
        "current_location.code" => ['nullable', 'string', 'max:255'],
        "current_location.type" => ['nullable', 'string', 'max:255'],

        "connote.id" => ['required', 'string'],
        "connote.connote_number" => ['nullable', 'numeric'],
        "connote.connote_service" => ['nullable', 'string'],
        "connote.connote_service_price" => ['nullable', 'numeric'],
        "connote.connote_amount" => ['nullable', 'numeric'],
        "connote.connote_code" => ['nullable', 'string'],
        "connote.connote_booking_code" => ['nullable', 'string'],
        "connote.connote_order" => ['nullable', 'numeric'],
        "connote.connote_state" => ['nullable', 'string'],
        "connote.connote_state_id" => ['nullable', 'numeric'],
        "connote.zone_code_from" => ['nullable', 'string'],
        "connote.zone_code_to" => ['nullable', 'string'],
        "connote.surcharge_amount" => ['nullable', 'string'],
        "connote.actual_weight" => ['nullable', 'numeric'],
        "connote.volume_weight" => ['nullable', 'numeric'],
        "connote.chargeable_weight" => ['nullable', 'numeric'],
        "connote.organization_id" => ['nullable', 'numeric'],
        "connote.location_id" => ['nullable', 'string'],
        "connote.connote_total_package" => ['nullable', 'numeric'],
        "connote.connote_surcharge_amount" => ['nullable', 'numeric'],
        "connote.connote_sla_day" => ['nullable', 'numeric'],
        "connote.location_name" => ['nullable', 'string'],
        "connote.location_type" => ['nullable', 'string'],
        "connote.source_tariff_db" => ['nullable', 'string'],
        "connote.id_source_tariff" => ['nullable', 'numeric'],
        "connote.pod" => ['nullable', 'string'],
        "connote.history" => ['nullable', 'array'],

        "koli_data.*.id" => ['required', 'string'],
        "koli_data.*" => ['nullable', 'array'],
        "koli_data.*.koli_length" => ['nullable', 'numeric'],
        "koli_data.*.awb_url" => ['nullable', 'string'],
        "koli_data.*.koli_chargeable_weight" => ['nullable', 'numeric'],
        "koli_data.*.koli_width" => ['nullable', 'numeric'],
        "koli_data.*.koli_surcharge" => ['nullable', 'array'],
        "koli_data.*.koli_height" => ['nullable', 'numeric'],
        "koli_data.*.koli_description" => ['nullable', 'string'],
        "koli_data.*.koli_formula_id" => ['nullable', 'string'],
        "koli_data.*.koli_volume" => ['nullable', 'numeric'],
        "koli_data.*.koli_weight" => ['nullable', 'numeric'],
        "koli_data.*.koli_custom_field.*" => ['nullable', 'string'],
        "koli_data.*.koli_code" => ['nullable', 'string'],

        "connote.transaction_id" => ['nullable', 'string', 'exists:mongodb.transactions,id'],
        "koli_data.*.connote_id" => ['nullable', 'string'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        $request->merge(['id' => $request->id]);
        parent::__construct($request, $relations);
    }
}
