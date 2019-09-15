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
    
}
