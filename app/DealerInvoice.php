<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoice extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoiceNo', 
        'orderId', 
        'productId',
        'invoiceUnit',
        'freeUnit',
        'totalUnit',
        'totalPrice',
        'remainUnit',
        'remainBalance',
    ];
    public function order()
    {
        return $this->belongsTo('SGFL\Order');
    }
    
    public function warehouseInvoice()
    {
        return $this->belongsTo('SGFL\Product');
    }

}
