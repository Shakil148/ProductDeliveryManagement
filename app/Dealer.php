<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'name', 
        'contact', 
        'address',
    ];

    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
    public function payment()
    {
        return $this->belongsToMany('App\Payement');
    }
}
