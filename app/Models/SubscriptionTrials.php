<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTrials extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email', 
        'stripe_id',
        'trial_ends_at',
    ];
}
