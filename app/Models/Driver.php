<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'dispatcher_id', 'vehicle_type', 'plate_no', 'license_number', 'contact_no'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
