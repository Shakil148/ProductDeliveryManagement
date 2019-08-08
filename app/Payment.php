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

    public function dealer()
    {
        return $this->hasMany('App\Dealer');
    }
   
}
