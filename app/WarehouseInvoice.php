<?php

namespace SGFL;

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
        return $this->hasMany('SGFL\Product');
    }
    public function mainWarehouse()
    {
        return $this->hasOne('SGFL\MainWarehouse');
    }
    public function warehouse()
    {
        return $this->hasOne('SGFL\Warehouse');
    }
    public function distributor()
    {
        return $this->hasOne('SGFL\Distributor');
    }
}
