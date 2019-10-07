<?php

namespace SGFL;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoiceNo', 
        'date', 
        'driverName',
        'helperName',
        'contact',
        'carNo',
        'locationStart',
        'locationEnd',
        'kplCost',
        'policeCost',
        'foodAllowanceCost',
        'maintainingCost',
        'tollCost',
        'othersCost',
        'totalCost',
    ];



}
