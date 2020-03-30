@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-thumbnail" src="{{ $product->image_path }}">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <h2 class="col-md">{{ $product->name }}</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            <span class="mr-3">価格:</span>
                            <soan class="h5 text-danger">¥{{ number_format($product->price) }}</soan>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md">
                            {{ $product->description }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            @if(Auth::guard('user')->check())
                                @if(($product->isWish(Auth::guard('user')->user()->id)) == false )
                                    <a class="toggle_wish" data-product-id="{{ $product->id}}" data-user-id="{{ Auth::guard('user')->user()->id }}" data-wished="false">
                                        <i class="far fa-star"></i>
                                    </a>
                                @else
                                    <a class="toggle_wish" data-product-id="{{ $product->id }}" data-user-id="{{ Auth::guard('user')->user()->id }}" data-wished="true">
                                        <i class="fas fa-star"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md">
                    @if(Auth::guard('user')->check())
                        <a class="btn btn-primary" href="{{ url('products/'.$product->id.'/product_reviews/create') }}">レビューを書く</a>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md">
                    <ul class="list-unstyled">
                        @foreach($productReviews as $productReview)
                            <li class="media bg-white p-2 mb-3">
                                <img src="{{ str_replace('public', '', $productReview->reviewer->image_path) }}" width="30" height="30" class="mr-3">
                                <div class="media-body">
                                    <h6>{{ $productReview->reviewer->name}}</h6>
                                        @can('update',$productReview)
                                            <a href="{{ url('products/'.$productReview->product_id.'/product_reviews/'.$productReview->id.'/edit') }}">
                                                <h5>{{ $productReview->title }}</h5>
                                            </a>
                                        @elsecan('notUpdate',$productReview)
                                            <h5>{{ $productReview->title }}</h5>
                                        @endcan
                                    <div class="text-warning">{{ config('consts.rank')[$productReview->rank] }}</div>
                                    {{ $productReview->body }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection
