<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdminSession
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminSession whereUserId($value)
 * @mixin \Eloquent
 */
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
