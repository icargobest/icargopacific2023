<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addShipment($data){
        return $this->create($data);
    }

    function getShipmentId($id){
        return $this->find($id);
    }
}
