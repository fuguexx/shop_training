<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\admin\ProductCategories;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $query = ProductCategories::query();
        switch($sort) {
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
            $productCategories = $query->Paginate($pageUnit);
        }

        return view('admin.product_categories.index', compact('productCategories', 'name', 'sort', 'pageUnit'));
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(ProductCategoriesRequest $request)
    {
        $productCategory = ProductCategories::create($request->all());

        return redirect('admin/product_categories/'.$productCategory->id);
    }

    public function show(ProductCategories $ProductCategory)
    {
        return view('admin.product_categories.show', compact('ProductCategory'));
    }

    public function edit(ProductCategories $ProductCategory)
    {
        return view('admin.product_categories.edit',compact('ProductCategory'));
    }

    public function update(ProductCategoriesRequest $request, ProductCategories $ProductCategory)
    {
        $ProductCategory->update($request->all());

        return redirect('admin/product_categories/'.$ProductCategory->id);
    }

    public function destroy(ProductCategories $ProductCategory)
    {
        $ProductCategory->delete();

        return redirect('admin/product_categories');
    }
}
