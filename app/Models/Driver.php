<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'vehicle_type', 'plate_no', 'license_number', 'contact_no', 
    'tel', 'street', 'city', 'postal_code', 'state', 'profile_image', 'postal_code', 'fb_account', 'in_account'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
