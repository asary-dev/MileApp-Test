<?php

namespace App\Transformer;

use App\Models\Transaction;
use Illuminate\Support\Collection;

class TransactionTransformer
{
    public static function detail(Transaction $data)
    {
        $connote = $data->connote || null;
        $koli_data = $data->connote ? $data->connote->koliData : collect();
        return [
            'id' => $data->id,
            'customer_name' => $data->customer_name,
            'customer_code' => $data->customer_code,
            'transaction_amount' => $data->transaction_amount,
            'transaction_discount' => $data->transaction_discount,
            'transaction_additional_field' => $data->transaction_additional_field,
            "transaction_payment_type" => $data->transaction_payment_type,
            "transaction_state" => $data->transaction_state,
            "transaction_code" => $data->transaction_code,
            "transaction_order" => $data->transaction_order,
            "location_id" => $data->location_id,
            "organization_id" => $data->organization_id,
            "transaction_payment_type_name" => $data->transaction_payment_type_name,
            "transaction_cash_amount" => $data->transaction_cash_amount,
            "transaction_cash_change" => $data->transaction_cash_change,
            "customer_attribute" => $data->customer_attribute,
            "origin_data" => $data->origin_data,
            "destination_data" => $data->destination_data,
            "custom_field" => $data->custom_field,
            "current_location" => $data->current_location,
            "connote" => $connote ? ConnoteTransformer::detail($data->connote) : null,
            "koli_data" => $koli_data ? KoliDataTransformer::all($koli_data) : [],
        ];
    }

    public static function getId(Transaction $data)
    {
        return $data->id;
    }

    public static function getByField(Transaction $data, $field)
    {
        return $data[$field];
    }

    public static function all(Collection $data)
    {
        return $data->transform(function ($item, $key) {
            return [
                'id' => $item->id,
                'customer_name' => $item->customer_name,
            ];
        });
    }
}
