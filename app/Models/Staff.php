<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'contact_no'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStaff($id)
    {
        return $this->select('staff.*', 'users.email', 'users.password')
            ->join('users', 'users.id', '=', 'staff.user_id')
            ->where('staff.id', $id)
            ->first();
    }
}

