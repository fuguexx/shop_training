<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'product_reviews';

    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'body',
        'rank'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];

    public function product(){
        return $this->hasOne('Product::class');
    }

    public function user(){
        return $this->hasOne('User::class');
    }
}
