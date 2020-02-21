<?php

namespace App\Policies;

use App\Models\admin\AdminUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function viewAny(AdminUser $adminUser): bool
    {
        return $adminUser->isOwner();
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function view(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner || $loginUser->id === $adminUser->id;
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function create(AdminUser $adminUser): bool
    {
        return $adminUser->isOwner();
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function update(AdminUser $adminUser): bool
    {
        return $adminUser->isOwner() || $adminUser->isNormal() && $adminUser->id === Auth::guard('admin')->user()->id;
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function delete(AdminUser $adminUser): bool
    {
        return $adminUser->isOwner() && $adminUser->id != Auth::guard('admin')->user()->id;
    }

    public function isChangeAuthority(AdminUser $loginUser, AdminUser $adminUser)
    {

    }
}
