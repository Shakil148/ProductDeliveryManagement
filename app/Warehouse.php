<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'address',
        'contact',
    ];

    public function warehouseInvoice()
    {
        return $this->belongsToMany('SGFL\WarehouseInvoice');
    }
    public function order()
    {
        return $this->belongsToMany('SGFL\Order');
    }
}
