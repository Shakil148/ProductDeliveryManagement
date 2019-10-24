<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DepoInvoice extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'depoId', 
        'invoiceNo', 
        'date', 
        'grandTotalUnit',
        'truckNo',
        'driverName',
        'driverMobile',
        'comment',
        'userName',
    ];
    public function depo()
    {
        return $this->belongsTo('SGFL\Depo','depoId','id');
    } 
    public function depoInvoiceDetail()
    {
        return $this->hasMany('SGFL\DepoInvoiceDetail','depoInvoiceId','id');
    }
}
