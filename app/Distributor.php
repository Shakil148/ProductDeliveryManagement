<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 
        'contact', 
        'carNo',
    ];

    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\WarehouseOrder');
    }
    public function order()
    {
        return $this->belongsTo('SGFL\Order');
    }


}
