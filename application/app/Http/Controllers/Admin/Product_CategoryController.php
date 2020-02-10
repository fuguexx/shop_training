<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoriesRequest;
use App\Models\ProductCategory;

class Product_CategoryController extends Controller
{
    public function index(Request $request)
    {
        $productCategories = ProductCategory::paginate(10);

        //検索フィールド
        $searchParam = [
            'name' => '',
            'sort' => '',
            'page_unit' => ''
        ];

        if($request != NULL && $request->isMethod('get')) {
            $searchParam = $request->all();
        }

        switch ($searchParam) {
            case $searchParam['name'] != NULL:
                $param = ProductCategory::FilterLikeName($searchParam['name'])->get();
                break;
            case $searchParam['name'] != NULL && $searchParam['sort'] === "id-asc":
                $param = ProductCategory::FilterLikeName($searchParam['name'])->OrderByIdAsc($searchParam['sort'])->get();
                break;
            case $searchParam['name'] != NULL && $searchParam['sort'] === "id-asc" && $searchParam['page_unit'] === "10":
                $param = ProductCategory::FilterLikeName($searchParam['name'])->OrderByIdAsc($searchParam['sort'])->take(10);
                break;
            }


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
