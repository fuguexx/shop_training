<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'image_path',
        'name',
        'price',
        'description',
        'product_category_id'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];

    /* Product:model(product_category_id) & ProductCategory:model(id)のリレーション */
    public function category(){
        return $this->hasOne('ProductCategory::class');
    }
}
