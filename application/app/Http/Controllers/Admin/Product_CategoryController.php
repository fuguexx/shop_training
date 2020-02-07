<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\ProductCategory;

class Product_CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $categories = ProductCategory::query();
        $categories->where('name',$request->get('name'));


        $productCategories = ProductCategory::paginate(10);

        return view('admin.product_categories.index', compact('productCategories'));
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(ProductCategoriesRequest $request)
    {
        $ProductCategory = new ProductCategory;

        $ProductCategory->fill($request->all())->save();

        return redirect('admin/product_categories/'.$ProductCategory->id);
    }

    public function show(ProductCategory $ProductCategory)
    {
        return view('admin.product_categories.show', ['ProductCategory' => $ProductCategory]);
    }

    public function edit(ProductCategory $ProductCategory)
    {
        return view('admin.product_categories.edit',['ProductCategory' => $ProductCategory]);
    }

    public function update(ProductCategoriesRequest $request, ProductCategory $ProductCategory)
    {
        $ProductCategory->update($request->all());

        return redirect('admin/product_categories/'.$ProductCategory->id);
    }

    public function destroy(ProductCategory $ProductCategory)
    {
        $ProductCategory->delete();

        return redirect('admin/product_categories');
    }
}
