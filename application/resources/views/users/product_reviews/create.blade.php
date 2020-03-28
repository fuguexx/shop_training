@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row pt-3">
                <div class="col-sm">
                    <form action="{{ url('products/'.$product->id.'/product_reviews') }}" method="POST">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="userId" value="{{ Auth::guard('user')->user()->id }}">

                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="タイトル" autofocus="">
                            @error('title')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                        </div>

                        <div class="form-group">
                            <label for="body">本文</label>
                            <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}" placeholder="本文">
                            @error('body')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank1" name="rank" value="1"　@if( old('rank') == "1" ) checked @endif checked="">
                            <label class="form-check-label" for="rank1">星1つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank2" name="rank" value="2" @if( old('rank') == "2" ) checked @endif>
                            <label class="form-check-label" for="rank2">星2つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank3" name="rank" value="3" @if( old('rank') == "3" ) checked @endif>
                            <label class="form-check-label" for="rank3">星3つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank4" name="rank" value="4" @if( old('rank') == "4" ) checked @endif>
                            <label class="form-check-label" for="rank4">星4つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank5" name="rank" value="5" @if( old('rank') == "5" ) checked @endif>
                            <label class="form-check-label" for="rank5">星5つ</label>
                        </div>
                
                        <hr class="mb-3">

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ url('products/'.$product->id) }}" class="btn btn-secondary">商品へ戻る</a>
                            </li>
                            <li class="list-inline-item">
                                <button type="submit" class="btn btn-primary">レビュー</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
