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
        'date',
        'status',
        'image',
    ];

    public function mainWarehouse()
    {
        return $this->belongsTo('SGFL\MainWarehouse','productId','id');
    }
}
