<?php

namespace App\Policies;

use App\Models\admin\AdminUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * @param AdminUser $loginUser
     * @return bool
     */
    public function viewAny(AdminUser $loginUser): bool
    {
        return $loginUser->is_owner;
    }

    /**
     * @param AdminUser $loginUser
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
     * @param AdminUser $loginUser
     * @param AdminUser $adminUser
     * @return bool
     */
    public function update(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner || ($loginUser->id === $adminUser->id);
    }

    /**
     * @param AdminUser $loginUser
     * @param AdminUser $adminUser
     * @return bool
     */
    public function delete(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner && $loginUser->id != $adminUser->id;
    }

    /**
     * @param AdminUser $loginUser
     * @param AdminUser $adminUser
     * @return bool
     */
    public function isChangeAuthority(AdminUser $loginUser, AdminUser $adminUser): bool
    {
        return $loginUser->is_owner && $loginUser->id != $adminUser->id;
    }

    /**
     * @param AdminUser $loginUser
     * @param AdminUser $adminUser
     * @return bool
     */
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
