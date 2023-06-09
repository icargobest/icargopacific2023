<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'shipments';
    protected $fillable = ['station_id', 'company_name', 'tracking_number', 'user_id', 'sender_id', 'recipient_id', 'item', 'weight', 'length', 'width', 'height', 'service_type', 'order_type', 'category', 'mop', 'min_bid_amount', 'total_price', 'advFreight_total_amount', 'shipping_date', 'status', 'advTransferredfrom', 'advTransferredto', 'advTransferredStatus', 'photo', 'driver_id'];

    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }

    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    function getShipmentId($id)
    {
        return $this->find($id);
    }
}
