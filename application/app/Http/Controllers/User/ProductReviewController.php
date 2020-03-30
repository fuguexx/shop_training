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
    public function create(Request $request, Product $product)
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

    public function edit(Request $request, Product $product, ProductReview $productReview)
    {
        $categoryId = $request->get('product_category', 'all');
        $productKeyword = $request->get('keyword', '');

        $this->authorize('update', $productReview);

        return view('users.product_reviews.edit', compact('categoryId', 'productKeyword', 'product', 'productReview'));
    }

    public function update(UpdateRequest $request, Product $product, ProductReview $productReview)
    {
        $this->authorize('update', $productReview);

        $productReview->update($request->updateParameters());

        return redirect('products/'.$product->id);
    }
}
