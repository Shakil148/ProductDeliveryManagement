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
        return $this->belongsTo('SGFL\Product');
    }
    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\WarehouseInvoice');
    }
}
