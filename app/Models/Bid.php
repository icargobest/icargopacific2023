<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addBid($data){
        return $this->create($data);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

}
