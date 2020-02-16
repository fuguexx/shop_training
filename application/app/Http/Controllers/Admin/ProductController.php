<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\admin\Product;
use App\Models\admin\ProductCategory;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $productCategories = ProductCategory::all();

        $productCategory = $request->get('productCategory','all');
        $name = $request->get('name', '');

        $price = $request->get('price', '');
        if($price != '') {
            $price = (int)$price;
        }

        $priceCompare = $request->get('priceCompare', 'gteq');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $sort = $request->get('sort', 'id-asc');

        $query = Product::query();
        switch($sort) {
            case 'id-asc':
                $query = $query->orderBy('id', 'ASC');
                break;
            case 'id-desc':
                $query = $query->orderBy('id', 'DESC');
                break;
            case 'product-category-asc':
                $query = $query->orderBy('product_category_id', 'ASC');
                break;
            case 'product-category-desc':
                $query = $query->orderBy('product_category_id', 'DESC');
                break;
            case 'name-asc':
                $query = $query->orderBy('name', 'ASC');
                break;
            case 'name-desc':
                $query = $query->orderBy('name', 'DESC');
                break;
            case 'price-asc':
                $query = $query->orderBy('price', 'ASC');
                break;
            case 'price-desc':
                $query = $query->orderBy('price', 'DESC');
                break;
        }

        if($productCategory != 'all') {
            $query = $query->where('product_category_id', $productCategory);
        }

            $products = $query->whereLikeName($name)
                ->wherePriceCompare($priceCompare, $price)
                ->paginate($pageUnit);

        return view('admin.products.index',
            compact('products','productCategories', 'productCategory', 'name', 'price', 'priceCompare', 'sort', 'pageUnit'));
    }

    public function create()
    {
        $productCategories = ProductCategory::all();

        return view('admin.products.create', compact('productCategories'));
    }

    public function store(ProductRequest $request)
    {
        if($request->image_path != NULL) {
            $path = $request->file('image_path')->store('public/photo');
        }

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $path,
            ]);

        return redirect('admin/products/'.$product->id);
    }

    public function show(Product $Product)
    {
        $categoryName = Product::where('product_category_id', $Product->product_category_id)->first();

        $photo = str_replace('public', '',$Product->image_path);

        return view('admin.products.show', compact('Product','categoryName', 'photo'));
    }

    public function edit(Product $Product)
    {
        $productCategories = ProductCategory::all();

        $photo = str_replace('public', '',$Product->image_path);

        return view('admin.products.edit', compact('Product', 'productCategories', 'photo'));
    }

    public function update(ProductRequest $request, Product $Product)
    {
        if($request->image_path != NULL) {
            $path = $request->file('image_path')->store('public/photo');
        }

        if($request->delete_image == "1") {
            Product::where('id', $request->id)->update(['image_path' => NULL]);
        }

        $Product->update([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $path,
        ]);

        return redirect('admin/products/'.$Product->id);
    }

    public function destroy(Product $Product)
    {
        $Product->delete();

        return redirect('admin/products');
    }
}
