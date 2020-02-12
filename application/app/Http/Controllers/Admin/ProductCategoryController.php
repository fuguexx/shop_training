<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\ProductCategory;


class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name', null);
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $query = ProductCategory::query();
        switch($sort){
            case 'id-asc':
                $query = $query->orderBy('id', 'ASC');
                break;
            case 'id-desc':
                $query = $query->orderBy('id', 'DESC');
                break;
            case 'name-asc':
                $query = $query->orderBy('name', 'ASC');
                break;
            case 'name-desc':
                $query = $query->orderBy('name', 'DESC');
                break;
            case 'order-no-asc':
                $query = $query->orderBy('order_no', 'ASC');
                break;
            case 'order-no-desc':
                $query = $query->orderBy('order_no', 'DESC');
                break;
        }

        if($name != null){
            $query->FilterLikeName($name);
        }

        if($pageUnit != null){
            $query->paginate($pageUnit);
        }

        $productCategories = $query->get();

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
