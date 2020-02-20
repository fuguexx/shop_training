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
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function viewAny(AdminUser $adminUser)
    {
        if ($adminUser->isOwner === 1 ) {
            return true;
        }
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
}
