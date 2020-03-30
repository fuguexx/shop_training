<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');

        $query = Product::query();
        $products = $query->orderBy('updated_at', 'DESC')->take(4)->get();

        if (Auth::guard('user')->user() != null) {
            $wishLists = WishList::where('user_id', Auth::guard('user')->user()->id)->get();
        }

        return view('users.home', compact('products', 'wishLists', 'categoryId', 'productKeyword'));
    }
}
