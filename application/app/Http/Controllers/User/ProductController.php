<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {        
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');
        $sort = $request->get('sort', 'review_rank');
        $productCategory = ProductCategory::where('id', $categoryId)->first();

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

        if (Auth::guard('user')->user() != null) {
            switch ($sort) {
                case 'review_rank':
                    $query = $query->join('product_reviews', 'product_reviews.product_id', '=', 'products.id')
                    ->select('products.*')
                    ->groupBy('product_reviews.product_id')
                    ->orderByRaw('AVG(rank) DESC');
                    break;
                default:
                    break;
            }
        }

        switch ($sort) {
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

    public function show(Request $request, Product $product)
    {
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');

        $productReviews = ProductReview::where('product_id', $product->id)->orderBy('created_at', 'DESC')->get();

        return view('users.products.show', compact('product', 'productReviews', 'categoryId', 'productKeyword'));
    }
}
