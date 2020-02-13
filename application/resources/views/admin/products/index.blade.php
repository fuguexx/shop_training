@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <form class="shadow p-3 mt-3" method="get" action="{{ route('admin.products.index') }}">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <select class="custom-select" id="product_category" name="product_category">
                        <option value="all" selected="" >すべてのカテゴリー</option>
                        @foreach($productCategories as $productCategory)
                            <option value="{{ $productCategory->id }}" @if( old('product_category', $productCategory->id) == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-8 mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="名称">
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-3">
                    <div class="input-group">
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" min="0" placeholder="価格">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="price_compare" id="price-compare-gteq" value="gteq" checked="" @if( old('price_compare') == 'gteq') checked @endif>
                                    <label class="form-check-label" for="price-compare-gteq">以上</label>
                                </div>
                                <div class="form-check form-check-inline mr-0">
                                    <input class="form-check-input" type="radio" name="price_compare" id="price-compare-lteq" value="lteq" @if( old('price_compare') == 'lteq') checked @endif>
                                    <label class="form-check-label" for="price-compare-lteq">以下</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="sort">
                        <option value="id-asc" selected="" @if( old('sort') == "id-asc") selected @endif>並び替え: ID昇順</option>
                        <option value="id-desc" @if( old('sort') == "id-desc") selected @endif>並び替え: ID降順</option>
                        <option value="product-category-asc" @if( old('sort') == "product-category-asc") selected @endif>並び替え: 商品カテゴリ昇順</option>
                        <option value="product-category-desc" @if( old('sort') == "product-category-desc") selected @endif>並び替え: 商品カテゴリ降順</option>
                        <option value="name-asc" @if( old('sort') == "name-asc") selected @endif>並び替え: 名称昇順</option>
                        <option value="name-desc" @if( old('sort') == "name-desc") selected @endif>並び替え: 名称降順</option>
                        <option value="price-asc" @if( old('sort') == "price-asc") selected @endif>並び替え: 価格昇順</option>
                        <option value="price-desc" @if( old('sort') == "price-desc") selected @endif>並び替え: 価格降順</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="pageUnit">
                        <option value="10" selected="" @if( old('pageUnit') == "10") selected @endif>表示: 10件</option>
                        <option value="20" @if( old('pageUnit') == "20") selected @endif>表示: 20件</option>
                        <option value="50" @if( old('pageUnit') == "50") selected @endif>表示: 50件</option>
                        <option value="100" @if( old('pageUnit') == "100") selected @endif>表示: 100件</option>
                    </select>
                </div>
                <div class="col-sm mb-3">
                    <button type="submit" class="btn btn-block btn-primary">検索</button>
                </div>
            </div>
        </form>
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success">新規</a>
            </li>
        </ul>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品カテゴリ</th>
                        <th>名称</th>
                        <th>価格</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->ProductCategory->name }}</td>
                            <td><a href="{{ url('/admin/products/'.$product->id) }}">{{ $product->name }}</a></td>
                            <td>¥{{ number_format($product->price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                        <span class="page-link" aria-hidden="true">‹</span>
                    </li>

                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=2') }}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=3') }}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=4') }}">4</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=5') }}">5</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=6') }}">6</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=7') }}">7</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=8') }}">8</a></li>

                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>

                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=37') }}">37</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=38') }}">38</a></li>

                    <li class="page-item">
                        <a class="page-link" href="{{ url('/admin/products'.'?product_category=all&amp;name=&amp;price=&amp;price_compare=gteq&amp;sort=id-asc&amp;page_unit=10&amp;page=2') }}" rel="next" aria-label="次 »">›</a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
@endsection
