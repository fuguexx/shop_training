@extends('layouts.app')
@section('content')
    @if(Auth::guard('user')->check())
        <div class="row">
            <main role="main" class="col-sm-12 px-4 py-2">
                <div class="row">
                    <div class="col-md">
                        <h3 class="border-bottom mb-3">ほしいものリスト</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-4">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @else
        <div class="row">
            <main role="main" class="col-sm-12 px-4 py-2">
                <div class="row">
                    <div class="col-md">
                        <h3 class="border-bottom mb-3">新着</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <a href="{{ url('products/'.$product->id) }}">
                                    <img class="card-img-top bd-placeholder-img" src="{{ str_replace('public', '',$product->image_path) }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    @endif
@endsection
