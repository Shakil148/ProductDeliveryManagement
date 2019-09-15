<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoice extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoiceNo', 
        'orderId', 
        'totalPrice',
        'remainUnit',
        'remainBalance',
        'comment',
    ];
    public function dealerInvoiceDetail()
    {
        return $this->belongsTo('SGFL\DealerInvoiceDetail','dealearInvoiceId','id');
    }
    

}
