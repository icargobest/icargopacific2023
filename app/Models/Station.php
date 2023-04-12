<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addStation($data){
        return $this->create($data);
    }

    public function getStation(){
        return $this->all();
    }

}
