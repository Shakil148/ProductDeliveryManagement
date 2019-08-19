<?php

namespace SGFL;

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
        return $this->hasMany('SGFL\Dealer');
    }
   
}
