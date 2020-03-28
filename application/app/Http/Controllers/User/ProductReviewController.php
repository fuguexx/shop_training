<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductReview\StoreRequest;
use App\Http\Requests\ProductReview\UpdateRequest;
use App\Models\Product;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function create(Product $product, Request $request)
    {
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');

        return view('users.product_reviews.create', compact('categoryId', 'productKeyword', 'product'));
    }

    public function store(StoreRequest $request, Product $product)
    {
        ProductReview::create($request->storeParameters());

        return redirect('products/'.$product->id);
    }

    public function edit(Request $request)
    {
        
    }

    public function update(UpdateRequest $request)
    {
        
    }
}
