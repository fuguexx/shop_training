<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
    
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
