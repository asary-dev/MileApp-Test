<?php

namespace App\Transformer;

use App\Models\KoliData;
use Illuminate\Support\Collection;

class KoliDataTransformer
{
    public static function detail(KoliData $data)
    {
        return [
            "id" => $data->id,
            "awb_url" => $data->awb_url,
            "created_at" => $data->created_at,
            "koli_chargeable_weight" => $data->koli_chargeable_weight,
            "koli_width" => $data->koli_width,
            "koli_surcharge" => $data->koli_surcharge,
            "koli_height" => $data->koli_height,
            "updated_at" => $data->updated_at,
            "koli_description" => $data->koli_description,
            "koli_formula_id" => $data->koli_formula_id,
            "connote_id" => $data->connote_id,
            "koli_volume" => $data->koli_volume,
            "koli_weight" => $data->koli_weight,
            "koli_length" => $data->koli_length,
            "koli_custom_field" => $data->koli_custom_field,
            "koli_code" => $data->koli_code,
        ];
    }

    public static function getId(KoliData $data)
    {
        return $data->id;
    }

    public static function getByField(KoliData $data, $field)
    {
        return $data[$field];
    }

    public static function all(Collection $data)
    {
        return $data->transform(function ($item, $key) {
            return static::detail($item);
        });
    }
}
