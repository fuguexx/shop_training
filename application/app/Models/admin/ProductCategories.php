<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCategories
 *
 * @property int $id
 * @property string $name
 * @property int $order_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\ProductCategories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCategories extends Model
{
    protected $fillable = [
        'name',
        'order_no',
        ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];

    public function scopeFilterLikeName($query, $name)
    {
        return $query->where('name','like','%'.$name.'%');
    }
}
