<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\admin\ProductCategory;

<<<<<<< Updated upstream:application/app/Http/Controllers/Admin/ProductCategoryController.php

=======
>>>>>>> Stashed changes:application/app/Http/Controllers/Admin/Product_CategoryController.php
class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< Updated upstream:application/app/Http/Controllers/Admin/ProductCategoryController.php
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
=======
        $productCategories = ProductCategory::paginate(10);

        $name = $request->get('name',null);
        $sort = $request->get('sort','id-asc');
        $pageUnit = $request->get('pageUnit', 10);

        $productCategories = ProductCategory::all();
        switch ($sort) {
            case 'id-asc':
                $productCategories = $productCategories->oder('id','ASC');
                break;
            case 'id-desc':
                $productCategories = $productCategories->oder('id','DESC');
                break;
            case 'name-asc':
                $productCategories = $productCategories->oder('name','ASC');
                break;
            case 'name-desc':
                $productCategories = $productCategories->oder('name','DESC');
                break;
            case 'order-no-asc':
                $productCategories = $productCategories->oder('order_no','ASC');
                break;
            case 'order-no-desc':
                $productCategories = $productCategories->oder('order_no','DESC');
>>>>>>> Stashed changes:application/app/Http/Controllers/Admin/Product_CategoryController.php
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
        $productCategory = ProductCategory::create($request->all());

        return redirect('admin/product_categories/'.$productCategory->id);
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
