<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $primaryKey = 'id';

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
        return $this->belongsTo('SGFL\Payement','dealerId','id');
    }
}
