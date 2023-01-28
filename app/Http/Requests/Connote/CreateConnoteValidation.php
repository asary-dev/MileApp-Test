<?php

namespace App\Http\Requests\Connote;

use App\Http\Requests\Validation;
use Illuminate\Http\Request;

class CreateConnoteValidation extends Validation
{
    public static $rules = [
        "connote_number" => ['required', 'numeric'],
        "connote_service" => ['required', 'string'],
        "connote_service_price" => ['required', 'numeric'],
        "connote_amount" => ['required', 'numeric'],
        "connote_code" => ['required', 'string'],
        "connote_booking_code" => ['nullable', 'string'],
        "connote_order" => ['required', 'numeric'],
        "connote_state" => ['required', 'string'],
        "connote_state_id" => ['required', 'numeric'],
        "zone_code_from" => ['required', 'string'],
        "zone_code_to" => ['required', 'string'],
        "surcharge_amount" => ['nullable', 'string'],
        "transaction_id" => ['required', 'string', 'exists:mongodb.transactions,id'],
        "actual_weight" => ['required', 'numeric'],
        "volume_weight" => ['required', 'numeric'],
        "chargeable_weight" => ['required', 'numeric'],
        "organization_id" => ['required', 'numeric'],
        "location_id" => ['required', 'string'],
        "connote_total_package" => ['required', 'numeric'],
        "connote_surcharge_amount" => ['nullable', 'numeric'],
        "connote_sla_day" => ['required', 'numeric'],
        "location_name" => ['required', 'string'],
        "location_type" => ['required', 'string'],
        "source_tariff_db" => ['required', 'string'],
        "id_source_tariff" => ['required', 'numeric'],
        "pod" => ['nullable', 'string'],
        "history" => ['nullable', 'array'],
    ];

    public function __construct(Request $request, array $relations = [])
    {
        parent::__construct($request, $relations);
    }
}
