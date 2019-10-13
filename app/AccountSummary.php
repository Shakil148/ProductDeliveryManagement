<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class AccountSummary extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'dealerId', 
        'date', 
        'paymentNo', 
        'invoiceNo', 
        'paidAmount',
        'doAmount',
        'balance',
    ];
    public function dealer()
    {
        return $this->belongsTo('SGFL\Dealer','dealerId','id');
    }
}
