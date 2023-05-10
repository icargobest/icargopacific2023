<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'contact_no', 'archived'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
