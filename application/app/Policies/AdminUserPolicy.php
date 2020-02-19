<?php

namespace App\Policies;

use App\Models\admin\AdminUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any admin users.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function view(User $user, AdminUser $adminUser)
    {
        //
    }

    /**
     * Determine whether the user can create admin users.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function update(User $user, AdminUser $adminUser)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function delete(User $user, AdminUser $adminUser)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function restore(User $user, AdminUser $adminUser)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function forceDelete(User $user, AdminUser $adminUser)
    {
        //
    }
}
