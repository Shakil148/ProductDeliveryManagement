<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'address',
        'contact',
    ];

    public function warehouseInvoice()
    {
        return $this->belongsToMany('App\WarehouseInvoice');
    }
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
}
