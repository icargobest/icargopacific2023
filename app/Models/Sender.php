<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'sender_mobile',
        'sender_tel',
        'sender_email',
        'sender_address',
        'sender_city',
        'sender_state',
        'sender_zip',
        'shipment_id',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
