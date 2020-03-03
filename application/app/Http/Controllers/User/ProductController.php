<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');
        $sort = $request->get('sort', 'review_rank');

        $productCategory = Product::where('product_category_id', $categoryId)->first();

        if ($categoryId === 'all' && $productKeyword === NULL) {
            return redirect('/home');
        }

        $query = Product::query();
        if ($productKeyword != '') {
            $query = $query->whereLikeName($productKeyword);
        }

        if ($categoryId != 'all') {
            $query = $query->where('product_category_id', $categoryId);
        }

        switch ($sort) {
            case 'review_rank':
                $query = $query->join('product_reviews', 'product_reviews.product_id', '=', 'products.id')
                ->select('products.*')
                ->groupBy('product_reviews.product_id')
                ->orderByRaw('AVG(rank) DESC');
                break;
            case 'price-asc':
                $query = $query->orderBy('price', 'ASC');
                break;
            case 'price-desc':
                $query = $query->orderBy('price', 'DESC');
                break;
            case 'updated_at-desc':
                $query = $query->orderBy('updated_at', 'DESC');
                break;
            default:
                break;
        }
        $productProperties = $query->paginate(15);

        return view('users.products.index',
            compact('productProperties','productCategory', 'categoryId', 'productKeyword', 'sort'));
    }

    public function show(Request $request)
    {

    }
}
