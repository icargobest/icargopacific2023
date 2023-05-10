<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
