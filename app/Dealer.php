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
        'amount',
    ];

    public function order()
    {
        return $this->belongsToMany('SGFL\Order');
    }
    public function payment()
    {
        return $this->belongsTo('SGFL\Payement','dealerId','id');
    }
    public function dealerBalance()
    {
        return $this->hasOne('SGFL\DealerBalance','dealerId','id');
    }
    public function dealerBalanceRecord()
    {
        return $this->hasMany('SGFL\DealerBalanceRecord','dealerId','id');
    }
    public function dealerInvoice()
    {
        return $this->hasOne('SGFL\DealerInvoice','dealerId','id');
    }
}
