<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'name', 
        'contact', 
        'address',
        'status',
    ];

    public function order()
    {
        return $this->belongsToMany('SGFL\Order');
    }
    public function payment()
    {
        return $this->belongsToMany('SGFL\Payement');
    }
}
