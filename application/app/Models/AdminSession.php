<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSession extends Model
{
    protected $table = 'admin_sessions';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
}
