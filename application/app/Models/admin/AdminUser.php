<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\AdminUsers
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\admin\AdminUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminUser extends Authenticatable
{
    use Notifiable;

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

    public function scopeLikeName(Builder $query, ?string $name): Builder
    {
        if (is_null($name) || $name === '' ) {
            return $query;
        }

        return $query->where('name','like','%'.$name.'%');
    }

    public function scopeLikeEmail(Builder $query, ?string $email): Builder
    {
        if (is_null($email) || $email === '' ) {
            return $query;
        }

        return $query->where('email','like','%'.$email);
    }

    public function scopeLikeAuthority(Builder $query, ?string $authority): Builder
    {
        switch ($authority) {
            case 'owner':
                return $query->where('is_owner', "1");
                break;
            case 'general':
                return $query->where('is_owner', "0");
                break;
            default:
                return $query->where('is_owner', "1")
                        ->orWhere('is_owner', "0");
                break;
        }
    }
}
