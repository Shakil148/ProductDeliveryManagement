<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoiceDetail extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'productId',
        'dealerInvoiceId',
        'product',
        'price',
        'invoiceUnit',
        'freeUnit',
        'totalUnit',
        'total',
    ];
    public function dealerInvoice()
    {
        return $this->belongsTo('SGFL\DealerInvoice','dealerInvoiceId','id');
    }
    public function product()
    {
        return $this->belongsTo('SGFL\Product','productId','id');
    }
}
