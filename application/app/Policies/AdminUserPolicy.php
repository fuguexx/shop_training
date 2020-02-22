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
    public function viewAny(AdminUser $loginUser): bool
    {
        return $loginUser->is_owner;
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function view(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner || ($loginUser->id === $adminUser->id);
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function create(AdminUser $loginUser): bool
    {
        return $loginUser->is_owner;
    }

    /**
     * @param User $user
     * @param AdminUser $adminUser
     */
    public function update(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner || ($loginUser->id === $adminUser->id);
    }

    /**
     * @param AdminUser $adminUser
     * @return bool
     */
    public function delete(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner && $loginUser->id != $adminUser->id;
    }

    public function isChangeAuthority(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner && $loginUser->id != $adminUser->id;
    }

    public function notChangeAuthority(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        switch ($adminUser->is_owner) {
            case true:
                return $loginUser->id === $adminUser->id;
                break;
            case false:
                return true;
                break;
            default:
                break;
        }
    }
}
