<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'shipments';
    protected $fillable = ['tracking_number', 'user_id', 'sender_id', 'recipient_id', 'weight', 'length', 'width', 'height', 'service_type', 'order_type', 'category', 'min_bid_amount', 'total_price', 'status'];

    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }

    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    function getShipmentId($id){
        return $this->find($id);
    }
}
