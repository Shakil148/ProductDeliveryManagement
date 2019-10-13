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
        'userName',
    ];

    public function product()
    {
        return $this->hasOne('SGFL\Product','id','productId');
    }
    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\WarehouseOrder');
    }
}
