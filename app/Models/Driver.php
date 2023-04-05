<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['driver_name', 'vehicle_type', 'plate_no'];

    public function store($data){
        return $this->create($data);
    }
}
