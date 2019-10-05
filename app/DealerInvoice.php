<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerInvoice extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'dealerId', 
        'invoiceNo', 
        'date', 
        'orderId', 
        'totalPrice',
        'remainUnit',
        'remainBalance',
        'grandTotalUnit',
        'userName',
        'truckNo',
        'driverName',
        'driverMobile',
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
