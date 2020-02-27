@extends('layouts.app')
@section('content')
    <div class="row">
        <main role="main" class="col-sm-12 px-4 py-2">
            <div class="row">
                <div class="col-md border shadow-sm py-2 d-flex">
                    <div>検索結果 22 のうち 1-15件 <span class="font-weight-bold">ミュージック</span> : <span class="text-danger">"a"</span></div>
                    <form class="ml-auto" action="http://13.113.124.239/products">
                        <input type="hidden" name="product_category" value="5">
                        <input type="hidden" name="keyword" value="a">
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
            </div>
            <div class="row pt-2">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <a href="http://13.113.124.239/products/71" target="_blank">
                            <img class="card-img-top bd-placeholder-img" src="" alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">soluta sit eum nobis repellat</h5>
                            <p class="card-text">¥48,275</p>
                        </div>
                    </div>
                </div>
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
