<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class DealerBalance extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'dealerId', 
        'amount',
    ];
    public function dealer()
    {
        return $this->belongsTo('SGFL\Dealer','dealerId','id');
    }

}
