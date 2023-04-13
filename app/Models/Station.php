<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'station_number',
        'station_name',
        'station_address',
        'station_contact_no',
        'station_email',
        'archived',
    ];

    public function addStation($data){
        return $this->create($data);
    }

    public function getStation(){
        return $this->all();
    }

    public function updateStation($data, $id){
        $station = $this->find($id);
        $station->update($data);
    }

}
