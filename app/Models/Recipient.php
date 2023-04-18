<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_name',
        'recipient_mobile',
        'recipient_tel',
        'recipient_email',
        'recipient_address',
        'recipient_city',
        'recipient_state',
        'recipient_zip',
        'shipment_id',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
