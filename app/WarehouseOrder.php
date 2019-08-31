<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class WarehouseOrder extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'orderNo',
        'orderDate',
        'amount',
        'cart',
        'paymentId',
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
        return $this->belongsTo('SGFL\Warehouse');
    }
    public function distributor()
    {
        return $this->hasOne('SGFL\Distributor');
    }
}
