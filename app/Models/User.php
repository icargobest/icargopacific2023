<?php
  
namespace App\Models;
  
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
            get: fn ($value) =>  ["user", "super-admin", "company", "driver"][$value],
        );
    }
}