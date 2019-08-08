<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name', 
        'contact', 
        'carNo', 
        'status',
    ];
}
