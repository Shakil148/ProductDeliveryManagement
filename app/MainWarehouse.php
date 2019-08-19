<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class MainWarehouse extends Model
{
    protected $fillable = [
        'date', 
        'address', 
        'amount', 
        'discount', 
        'productId',
    ];

    public function product()
    {
        return $this->hasMany('SGFL\Product');
    }
    public function warehouseInvoice()
    {
        return $this->belongsToMany('SGFL\WarehouseInvoice');
    }
}
