<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Dispatcher;
use App\Models\SubscriptionTrials;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function dispatcher()
    {
        return $this->belongsTo(Dispatcher::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "super-admin", "company", "driver", "dispatcher", "staff"][$value],
        );
    }

    public function subscription()
    {
        return $this->hasOne(SubscriptionTrials::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function subscribed()
    {
        return $this->subscription_trials && $this->subscription_trials->trial_ends_at->gt(now());
    }
}
