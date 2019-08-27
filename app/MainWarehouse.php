<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class MainWarehouse extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'date', 
        'address', 
        'amount', 
        'discount', 
        'productId',
    ];

    public function product()
    {
        return $this->hasMany('SGFL\Product','productId','id');
    }
    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\WarehouseInvoice');
    }
}
