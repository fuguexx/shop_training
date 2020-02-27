<?php

namespace App\Http\Controllers\User;

use App\Models\admin\ProductCategory;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productCategories = ProductCategory::all();

        return view('users.home', compact('productCategories'));
    }
}
