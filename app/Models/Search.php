<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $table = 'shipments'; // the name of the table in the database
    protected $primaryKey = 'id'; // the name of the primary key column in the table

    protected $fillable = [
        'tracking_number',
        // add other fillable fields if necessary
    ];
}
