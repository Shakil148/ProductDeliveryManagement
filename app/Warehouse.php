<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'contact',
        'status',
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
