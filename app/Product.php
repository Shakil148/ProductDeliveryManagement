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
        'totalStock',
        'userName',
    ];

    public function mainWarehouse()
    {
        return $this->belongsTo('SGFL\MainWarehouse','id','productId');
    }
    public function dealerInvoiceDetail()
    {
        return $this->hasOne('SGFL\DealerInvoiceDetail','productId','id');
    }
}
