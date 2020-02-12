<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image_path',
        'name',
        'price',
        'description',
        'product_category_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];

    /* Products:model(product_category_id) & ProductCategories:model(id)のリレーション */
    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategories::class);
    }
}
