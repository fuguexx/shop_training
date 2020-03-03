<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'body',
        'rank',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
}
