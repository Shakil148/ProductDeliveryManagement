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
        'distributorId',
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function mainWarehouse()
    {
        return $this->hasOne('App\MainWarehouse');
    }
    public function warehouse()
    {
        return $this->hasOne('App\Warehouse');
    }
    public function distributor()
    {
        return $this->hasOne('App\Distributor');
    }
}
