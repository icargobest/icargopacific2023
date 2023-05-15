<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobile',
        'tel',
        'street',
        'city',
        'state',
        'postal_code',
        'photo',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'archived'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
