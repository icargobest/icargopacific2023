<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTrackingLog extends Model
{
    use HasFactory;

    protected $fillable = ['shipment_id', 'tracking_number', 'shipment_id', 'status'];

    public function order()
    {
        return $this->belongsTo(Shipment::class);
    }
}
