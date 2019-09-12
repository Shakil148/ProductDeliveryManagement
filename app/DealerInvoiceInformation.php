<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoiceInformation extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [ 
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
