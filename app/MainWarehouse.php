<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainWarehouse extends Model
{
    protected $fillable = [
        'date', 
        'address', 
        'amount', 
        'discount', 
        'productId',
    ];
}
