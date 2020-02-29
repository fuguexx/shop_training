@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row">
                @if($productProperties->isNotEmpty())
                    <div class="col-md border shadow-sm py-2 d-flex">
                        <div>検索結果 {{ count($productProperties) }}件 のうち {{ $productProperties->firstItem() }}-{{ $productProperties->lastItem() }}件 <span class="font-weight-bold">@if(isset($productCategory)){{ $productCategory->ProductCategory->name }} @endif</span> @if(isset($productKeyword)) : <span class="text-danger">"{{ $productKeyword }}"</span>@endif</div>
                        <form class="ml-auto" action="{{ url('products') }}">
                            <label>
                                <select class="custom-select" name="sort" onchange="event.preventDefault();$(this).parent('form').submit();">
                                    <option value="review_rank" selected="">並び替え: レビューの評価順</option>
                                    <option value="price-asc">並び替え: 価格の安い順</option>
                                    <option value="price-desc">並び替え: 価格の高い順</option>
                                    <option value="updated_at-desc">並び替え: 最新商品</option>
                                </select>
                            </label>
                        </form>
                    </div>
                @else
                    <div class="col-md shadow-sm p-3 mb-5 bg-white rounded">
                        {{ $productKeyword }}の検索に一致する商品はありませんでした。
                    </div>
                @endif
            </div>

            <div class="row pt-2">
                @foreach($productProperties as $productProperty)
                    <div class="col-md-2">
                        <div class="card mb-4">
                            <a href="{{ url('products/'.$productProperty->id) }}" target="_blank">
                                <img class="card-img-top bd-placeholder-img" src="{{ str_replace('public', '', $productProperty->image_path) }}" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $productProperty->name }}</h5>
                                <p class="card-text">¥{{ number_format($productProperty->price) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md">
                    <nav>
                        <ul class="pagination">

                            <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>

                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="http://13.113.124.239/products?product_category=5&amp;keyword=a&amp;page=2">2</a></li>

                            <li class="page-item">
                                <a class="page-link" href="http://13.113.124.239/products?product_category=5&amp;keyword=a&amp;page=2" rel="next" aria-label="次 »">›</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </main>
    </div>
@endsection
