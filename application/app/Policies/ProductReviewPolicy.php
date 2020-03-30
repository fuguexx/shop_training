<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProductReview;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductReviewPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $loginUser
     * @param ProductReview $productReview
     * @return bool
     */
    public function update(User $loginUser, ProductReview $productReview): bool
    {
        return $loginUser->id === $productReview->user_id;
    }

    /**
     * @param User $loginUser
     * @param ProductReview $productReview
     * @return bool
     */
    public function notUpdate(User $loginUser, ProductReview $productReview): bool
    {
        return $loginUser->id != $productReview->user_id;
    }
}
