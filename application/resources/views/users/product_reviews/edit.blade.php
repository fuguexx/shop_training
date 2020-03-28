@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row pt-3">
                <div class="col-sm">
                    <form action="{{ url('products/'.$productReview->product_id.'/product_reviews/'.$productReview->id') }}" method="POST">
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="" placeholder="タイトル" autofocus="">
                        </div>

                        <div class="form-group">
                            <label for="body">本文</label>
                            <input type="text" class="form-control" id="body" name="body" value="" placeholder="本文">
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank1" name="rank" value="1">
                            <label class="form-check-label" for="rank1">星1つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank2" name="rank" value="2">
                            <label class="form-check-label" for="rank2">星2つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank3" name="rank" value="3">
                            <label class="form-check-label" for="rank3">星3つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank4" name="rank" value="4">
                            <label class="form-check-label" for="rank4">星4つ</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="rank5" name="rank" value="5" checked="">
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
