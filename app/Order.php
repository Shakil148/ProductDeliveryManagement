<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'orderNo', 
        'orderDate', 
        'amount', 
        'freeAmount',
        'totalBill', 
        'advancePayment', 
        'status', 
        'productId', 
        'warehouseId', 
        'dealerId', 
        'distributorId',
    ];

    public function product()
    {
        return $this->hasMany('SGFL\Product');
    }
    public function warehouse()
    {
        return $this->hasOne('SGFL\Warehouse');
    }
    public function dealer()
    {
        return $this->hasOne('SGFL\Dealer');
    }
    public function distributor()
    {
        return $this->hasOne('SGFL\Distributor');
    }
}
