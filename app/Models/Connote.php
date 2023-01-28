<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jenssegers\Mongodb\Eloquent\Model;

class Connote extends Model
{
    use HasUuids;

    protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $collection = 'connotes';

    protected $fillable = [
        "id",
        "connote_number",
        "connote_service",
        "connote_service_price",
        "connote_amount",
        "connote_code",
        "connote_booking_code",
        "connote_order",
        "connote_state",
        "connote_state_id",
        "zone_code_from",
        "zone_code_to",
        "surcharge_amount",
        "transaction_id",
        "actual_weight",
        "volume_weight",
        "chargeable_weight",
        "organization_id",
        "location_id",
        "connote_total_package",
        "connote_surcharge_amount",
        "connote_sla_day",
        "location_name",
        "location_type",
        "source_tariff_db",
        "id_source_tariff",
        "pod",
        "history",
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function koliData()
    {
        return $this->hasMany(koliData::class, 'connote_id');
    }
}
