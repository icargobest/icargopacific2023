<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    use HasFactory;
    protected $table = 'dispatchers';
    protected $fillable = ['user_id', 'company_id', 'station_id', 'contact_no', 'archived' , 'tel', 'street', 'city', 'postal_code', 'state', 'image', 'facebook', 'linkedin'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
