<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Models\ProductCategory;

/**
 * Class LayoutComposer
 * @package App\Http\ViewComposers
 */
class LayoutComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $productCategories = ProductCategory::orderBy('order_no', 'ASC')->get();

        $view->with([
            'productCategories' => $productCategories,
        ]);
    }
}
