<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\AdminUsers
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUsers whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminUsers extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'is_owner',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
