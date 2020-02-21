<?php

namespace App\Policies;

use App\Models\admin\AdminUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function viewAny(AdminUser $adminUser): bool
    {
        return $adminUser->is_owner === 1;
    }

    /**
     * @param Int $isOwner
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function view()
    {

    }

    /**
     * Determine whether the user can create admin users.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(AdminUser $adminUser): bool
    {
        return $adminUser->is_owner === 1;
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function update(AdminUser $adminUser)
    {
        //
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function delete(AdminUser $adminUser)
    {
        //
    }
}
