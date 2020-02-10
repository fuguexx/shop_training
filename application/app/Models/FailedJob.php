<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FailedJob
 *
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property string $failed_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FailedJob whereQueue($value)
 * @mixin \Eloquent
 */
class FailedJob extends Model
{
    protected $table = 'failed_jobs';

    protected $fillable = [
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $dates = [
    ];
}
