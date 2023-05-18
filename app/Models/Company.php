<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $table = 'companies';
    protected $fillable = ['user_id', 'contact_no', 'contact_name', 'company_address', 'archived', 'company_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

