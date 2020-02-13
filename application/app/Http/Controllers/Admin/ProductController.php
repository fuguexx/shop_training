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

        $product_category = $request->get('product_category','all');
        $name = $request->get('name', '');
        $price = $request->get('price', '');
        $price_compare = $request->get('price_compare', 'gteq');
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

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

        switch($price_compare) {
            case 'gteq':
                $query = $query->where('price', '>=', $price);
                break;
            case 'lteq':
                $query = $query->where('price', '<=', $price);
                break;
        }

        if($product_category != 'all'){
            $query->where('product_category_id', $product_category);
        }

        if($name != null){
            $query->FilterLikeName($name);
        }

        if($pageUnit != null){
            $products = $query->Paginate($pageUnit);
        }

        return view('admin.products.index', compact('products','productCategories'));
    }

    public function create()
    {
        $productCategories = ProductCategory::all();

        return view('admin.products.create', compact('productCategories'));
    }

    public function store(ProductRequest $request)
    {
        if($request->image_path != NULL){
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
        if($request->image_path != NULL){
            $path = $request->file('image_path')->store('public/photo');
        }

        if($request->delete_image == "1"){
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
