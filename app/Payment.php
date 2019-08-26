<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'date', 
        'type', 
        'amount', 
        'accountNo', 
        'status', 
        'dealerId',
    ];

    public function dealer()
    {
        return $this->hasMany('SGFL\Dealer','dealarId','id');
    }
   
}
