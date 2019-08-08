<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'date', 
        'type', 
        'amount', 
        'status', 
        'dealerId',
    ];
}
