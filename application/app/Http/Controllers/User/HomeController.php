<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\ProductCategory;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $query = ProductCategory::query();
        $productCategories = $query->orderBy('order_no', 'ASC')->get();

        $query = Product::query();
        $products = $query->orderBy('updated_at', 'DESC')->take(4)->get();

        return view('users.home', compact('productCategories', 'products'));
    }
}
