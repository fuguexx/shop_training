<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }
}
