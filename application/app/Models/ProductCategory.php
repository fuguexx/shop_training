<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property int $order_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = ['name', 'order_no'];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];

    public function scopeFilterLikeName($query, $name)
    {
        return $query->where('name','like','%{$name}%');
    }
}
