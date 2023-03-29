<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addEmployee($data){
        return $this->create($data);
    }

    public function deleteEmployee($id){
        return $this->where('id', $id)->delete();
    }

    function getEmployeeId($id){
        return $this->find($id);
    }

    public function updateEmployee($data, $id){
        $emp = $this->find($id);
        $emp->update($data);
    }

    public function archive()
    {
        $this->archived = true;
        $this->save();
    }

}
