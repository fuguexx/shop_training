<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Session
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereUserId($value)
 * @mixin \Eloquent
 */
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
