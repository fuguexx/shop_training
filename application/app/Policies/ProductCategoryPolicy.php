<?php

namespace App\Policies;

use App\Models\admin\ProductCategory;
use App\Models\admin\AdminUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {

    }

    public function view(): bool
    {

    }

    public function create(): bool
    {

    }

    public function update(): bool
    {

    }

    /**
     * @param AdminUser $loginUser
     * @param ProductCategory $productCategory
     * @return bool
     */
    public function delete(AdminUser $loginUser, ProductCategory $productCategory): bool
    {
        $categoryId = Product::where('product_category_id', $productCategory->id)->first('product_category_id');

        if ($categoryId === NULL || $categoryId === '') {
            return true;
        }
        return false;
    }
}
