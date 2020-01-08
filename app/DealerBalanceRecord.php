<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerBalanceRecord extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'dealerId',
        'paymentNo', 
        'type',
        'accountNo',
        'bankName',
        'amount',
        'date',
        'status',
        'comment',
        'userName',
    ];
    public function dealer()
    {
        return $this->belongsTo('SGFL\Dealer','dealerId','id');
    }
}
