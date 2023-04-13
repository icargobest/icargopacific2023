<?php
  
namespace App\Models;

use App\Models\Driver;
use App\Models\Dispatcher;
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
        'type'
    ];

    public function driverDetail(){
        return $this->hasOne(Driver::class, 'user_id', 'id');
    }

    public function dispatcherDetail(){
        return $this->hasOne(Dispatcher::class, 'user_id', 'id');
    }
  
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "super-admin", "company", "driver", "dispatcher"][$value],
        );
    }
}