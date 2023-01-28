<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jenssegers\Mongodb\Eloquent\Model;

class KoliData extends Model
{
    use HasUuids;

    protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $collection = 'koli_data';

    protected $fillable = [
        "id",
        "awb_url",
        "created_at",
        "koli_chargeable_weight",
        "koli_width",
        "koli_surcharge",
        "koli_height",
        "updated_at",
        "koli_description",
        "koli_formula_id",
        "connote_id",
        "koli_volume",
        "koli_weight",
        "koli_custom_field",
        "koli_code",
        "koli_length",
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function connote()
    {
        return $this->belongsTo(Connote::class, 'connote_id');
    }
}
