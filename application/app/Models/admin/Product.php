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

    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function scopeFilterLikeName($query, $name)
    {
        return $query->where('name','like','%'.$name.'%');
    }
}
