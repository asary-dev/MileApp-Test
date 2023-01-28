<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Transaction extends Model
{
    use HasUuids;
    use HasFactory;

    protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $collection = 'transactions';

    protected $fillable = [
        "id",
        'customer_name',
        'customer_code',
        'transaction_amount',
        'transaction_discount',
        'transaction_additional_field',
        "transaction_payment_type",
        "transaction_state",
        "transaction_code",
        "transaction_order",
        "location_id",
        "organization_id",
        "transaction_payment_type_name",
        "transaction_cash_amount",
        "transaction_cash_change",
        "customer_attribute",
        "origin_data",
        "destination_data",
        "custom_field",
        "current_location",
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function connote()
    {
        return $this->hasOne(Connote::class, 'transaction_id');
    }

    public function koliData()
    {
        return $this->hasManyThrough(
            KoliData::class,
            Connote::class,
            'transaction_id',
            'connote_id',
            'id',
            'id'
        );
    }
}
