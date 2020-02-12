@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <form class="shadow p-3 mt-3" method="get" action="{{ route('admin.product_categories.index') }}">
         @csrf
            <div class="row">
                <div class="col-md mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="名称">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="sort">
                        <option value="id-asc" selected="">並び替え: ID昇順</option>
                        <option value="id-desc">並び替え: ID降順</option>
                        <option value="name-asc">並び替え: 名称昇順</option>
                        <option value="name-desc">並び替え: 名称降順</option>
                        <option value="order-no-asc">並び替え: 並び順番号昇順</option>
                        <option value="order-no-desc">並び替え: 並び順番号降順</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="pageUnit">
                        <option value="10" selected="">表示: 10件</option>
                        <option value="20">表示: 20件</option>
                        <option value="50">表示: 50件</option>
                        <option value="100">表示: 100件</option>
                    </select>
                </div>
                <div class="col-sm mb-3">
                    <button type="submit" class="btn btn-block btn-primary">検索</button>
                </div>
            </div>
        </form>
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.product_categories.create') }}" class="btn btn-success">新規</a>
            </li>
        </ul>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>並び順番号</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productCategories as $productCategory)
                        <tr>
                            <td>{{ $productCategory->id }}</td>
                            <td><a href="{{ url('/admin/product_categories/'.$productCategory->id) }}">{{ $productCategory->name }}</a></td>
                            <td>{{ $productCategory->order_no }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                        <span class="page-link" aria-hidden="true">‹</span>
                    </li>

                    <li class="page-item active" aria-current="page"><a class="page-link" href="/admin/product_categories?name=&amp;sort=id-asc&amp;pageUnit=10&amp;page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="/admin/product_categories?name=&amp;sort=id-asc&amp;pageUnit=10&amp;page=2">2</a></li>
                    <li class="page-item"><a class="page-link" href="/admin/product_categories?name=&amp;sort=id-asc&amp;pageUnit=10&amp;page=3">3</a></li>
                    <li class="page-item"><a class="page-link" href="/admin/product_categories?name=&amp;sort=id-asc&amp;pageUnit=10&amp;page=4">4</a></li>

                    <li class="page-item">
                        <a class="page-link" href="/admin/product_categorie?name=&amp;sort=id-asc&amp;pageUnit=10&amp;page=2" rel="next" aria-label="次 »">›</a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
@endsection
