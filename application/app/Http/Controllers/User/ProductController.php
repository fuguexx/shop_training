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
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');
        $sort = $request->get('sort', 'review_rank');

        if ($categoryId === 'all' && $productKeyword === NULL) {
            return redirect('/home');
        }

        $productCategory = Product::where('product_category_id', $categoryId)->first();

        $query = Product::query();
        if ($productKeyword != '') {
            $query = $query->whereLikeName($productKeyword);
        }

        if ($categoryId != 'all') {
            $query = $query->where('product_category_id', $categoryId);
        }
        $productProperties = $query->paginate(15);


        return view('users.products.index',
            compact('productProperties','productCategory', 'categoryId', 'productKeyword'));
    }

    public function show(Request $request)
    {

    }
}
