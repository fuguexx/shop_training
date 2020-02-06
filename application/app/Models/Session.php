<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
}
