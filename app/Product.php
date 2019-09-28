<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'price', 
        'unit',
        'unitCost',
        'date',
        'status',
        'image',
        'userName',
    ];

    public function mainWarehouse()
    {
        return $this->belongsTo('SGFL\MainWarehouse','productId','id');
    }
    public function dealerInvoiceDetail()
    {
        return $this->hasOne('SGFL\DealerInvoiceDetail','productId','id');
    }
}
