<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name', 
        'contact', 
        'carNo', 
        'status',
    ];

    public function warehouseInvoice()
    {
        return $this->belongsTo('App\WarehouseInvoice');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }


}
