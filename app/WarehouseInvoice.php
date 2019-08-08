<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseInvoice extends Model
{
    protected $fillable = [
        'invoiceNo',
        'orderDate',
        'amount',
        'status',
        'productId',
        'mainwarehouseId',
        'warehouseId',
    ];
}
