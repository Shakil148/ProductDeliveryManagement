<?php

namespace App;

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
        return $this->hasMany('App\Product');
    }
    public function warehouse()
    {
        return $this->hasOne('App\Warehouse');
    }
    public function dealer()
    {
        return $this->hasOne('App\Dealer');
    }
    public function distributor()
    {
        return $this->hasOne('App\Distributor');
    }
}
