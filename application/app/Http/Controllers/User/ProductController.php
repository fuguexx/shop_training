<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductCategory::query();
        $productCategories = $query->orderBy('order_no', 'ASC')->get();

        $categoryId = $request->get('product_category', 'all');
        $productName = $request->get('keyword', '');

        return view('users.products.index', compact('productCategories'));

    }
}
