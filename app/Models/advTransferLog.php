<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advTransferLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'company_from',
        'staff_from',
        'company_to',
        'status'
    ];
}
