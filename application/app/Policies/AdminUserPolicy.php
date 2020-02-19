<?php

namespace App\Policies;

use App\Models\admin\AdminUser;
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
    public function index(AdminUser $adminUser)
    {
        return $adminUser->is_owner === "1";
    }

    /**
     * Determine whether the user can create admin users.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(AdminUser $adminUser)
    {
        return $adminUser->is_owner === "1";
    }

    /**
     * Determine whether the user can restore the admin user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function store(AdminUser $adminUser)
    {
        return $adminUser->is_owner === "1";
    }

    /**
     * Determine whether the user can view the admin user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Determine whether the user can update the admin user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function edit(AdminUser $adminUser)
    {
        //
    }

    /**
     * Determine whether the user can update the admin user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function update(AdminUser $adminUser)
    {
        //
    }

    /**
     * Determine whether the user can delete the admin user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function destroy(AdminUser $adminUser)
    {
        return $adminUser->is_owner === "1";
    }
}
