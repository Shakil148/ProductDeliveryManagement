<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name', 
        'contact', 
        'carNo',
    ];

    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\WarehouseInvoice');
    }
    public function order()
    {
        return $this->belongsTo('SGFL\Order');
    }


}
