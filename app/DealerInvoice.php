<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoice extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'dealerId', 
        'invoiceNo', 
        'orderId', 
        'totalPrice',
        'remainUnit',
        'remainBalance',
        'comment',
    ];
    public function dealer()
    {
        return $this->belongsTo('SGFL\Dealer','dealerId','id');
    }
    public function dealerInvoiceDetail()
    {
        return $this->hasMany('SGFL\DealerInvoiceDetail','dealerInvoiceId','id');
    }
    

}
