<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'name',
        'address',
        'contact',
        'status',
        'userName',
    ];
    public function depoInvoice()
    {
        return $this->hasOne('SGFL\DepoInvoice','depoId','id');
    }
}
