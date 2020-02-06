<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'order_no'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
}
