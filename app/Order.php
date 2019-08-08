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
}
