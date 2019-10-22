<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DepoInvoiceDetail extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'productId',
        'depoInvoiceId',
        'product',
        'invoiceUnit',
        'freeUnit',
        'totalUnit',
    ];
    public function depoInvoice()
    {
        return $this->belongsTo('SGFL\DepoInvoice','depoInvoiceId','id');
    }
    public function product()
    {
        return $this->belongsTo('SGFL\Product','productId','id');
    }
}
