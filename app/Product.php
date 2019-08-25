<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'unit',
        'date',
        'status',
        'image',
    ];

}
