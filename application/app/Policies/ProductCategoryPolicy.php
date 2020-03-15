<?php

namespace App\Policies;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\admin\AdminUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;

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
