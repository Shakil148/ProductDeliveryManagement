<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoiceNo', 
        'orderDate', 
        'deliveryDate', 
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
