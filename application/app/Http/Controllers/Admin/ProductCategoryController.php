<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\admin\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $query = ProductCategory::query();
        switch ($sort) {
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

        $productCategories = $query->likeName($name)->Paginate($pageUnit);

        return view('admin.product_categories.index', compact('productCategories', 'name', 'sort', 'pageUnit'));
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(ProductCategoriesRequest $request)
    {
        $productCategory = ProductCategory::create($request->all());

        return redirect('admin/product_categories/'.$productCategory->id);
    }

    public function show(ProductCategory $productCategory)
    {
        return view('admin.product_categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_categories.edit',compact('productCategory'));
    }

    public function update(ProductCategoriesRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());

        return redirect('admin/product_categories/'.$productCategory->id);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect('admin/product_categories');
    }
}
