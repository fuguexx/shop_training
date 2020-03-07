@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row">
                @if($productProperties->isNotEmpty())
                    <div class="col-md border shadow-sm py-2 d-flex">
                        <div>検索結果 {{ count($productProperties) }}件 のうち {{ $productProperties->firstItem() }}-{{ $productProperties->lastItem() }}件 <span class="font-weight-bold">@if(isset($productCategory)){{ $productCategory->ProductCategory->name }} @endif</span> @if(isset($productKeyword)) : <span class="text-danger">"{{ $productKeyword }}"</span>@endif</div>
                        <form id="submit_form" class="ml-auto" action="{{ url('products') }}">
                            <input type ="hidden" name="product_category" value="{{ $categoryId }}">
                            <input type ="hidden" name="keyword" value="{{ $productKeyword }}">

                            <label>
                                <select id="submit_select" class="custom-select" name="sort" onchange="event.preventDefault();$(this).parent('form').submit();">
                                    <option value="review_rank" selected="" @if( $sort == "review_rank") selected @endif>並び替え: レビューの評価順</option>
                                    <option value="price-asc" @if( $sort == "price-asc") selected @endif>並び替え: 価格の安い順</option>
                                    <option value="price-desc" @if( $sort == "price-desc") selected @endif>並び替え: 価格の高い順</option>
                                    <option value="updated_at-desc" @if( $sort == "updated_at-desc") selected @endif>並び替え: 最新商品</option>
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
                                <img class="card-img-top bd-placeholder-img" src="{{ str_replace('public', '', $productProperty->image_path) }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ url('products/'.$productProperty->id) }}" target="_blank">
                                    <h5 class="card-title">{{ $productProperty->name }}</h5>
                                </a>
                                <p class="card-text">¥{{ number_format($productProperty->price) }}</p>

                                @if(Auth::guard('user')->check())
                                    <a id="wish_submit" class="toggle_wish" data-product-id="{{ $productProperty->id }}" data-user-id="{{ Auth::guard('user')->user()->id }}" data-wished="false">
                                        <i class="far fa-star"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md">
                    <nav>
                        <ul class="pagination">
                        
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
@endsection
