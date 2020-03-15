<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    /**
     * @return bool
     */
    public function productWishBool(int $user): bool
    {
        return $this->hasMany(WishList::class, 'product_id', 'id')->where('user_id', $user)->exists();
    }

    /**
     * @param Builder $query
     * @param string|null $name
     * @return Builder
     */
    public function scopeWhereLikeName(Builder $query, ?string $name): Builder
    {
        if (is_null($name) || $name === '' ) {
            return $query;
        }
        return $query->where('name','like','%'.$name.'%');
    }

    /**
     * @param Builder $query
     * @param string|null $priceCompare
     * @param int|null $price
     * @return Builder
     */
    public function scopeWherePriceCompare(Builder $query, ?string $priceCompare, ?string $price): Builder
    {
        $builder = $query;

        if (is_null($price) || $price === '' ) {
            return $builder;
        }

        switch ($priceCompare) {
            case 'gteq':
                $builder = $query->where('price', '>=', $price);
                break;
            case 'lteq':
                $builder = $query->where('price', '<=', $price);
                break;
            default:
                break;
        }
        return $builder;
    }
}
