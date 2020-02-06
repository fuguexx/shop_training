@extends('layouts.admin')

@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <div class="row pt-3">
            <div class="col-sm">
                <form action="http://13.113.124.239/admin/products" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_category_id">商品カテゴリ</label>
                        <select class="custom-select " id="product_category_id" name="product_category_id">
                            <option value="1">デジタルミュージック</option>
                            <option value="2">Android アプリ</option>
                            <option value="3">本</option>
                            <option value="4">洋書</option>
                            <option value="5">ミュージック</option>
                            <option value="6">クラシック</option>
                            <option value="7">DVD</option>
                            <option value="8">TVゲーム</option>
                            <option value="9">PCソフト</option>
                            <option value="10">パソコン・周辺機器</option>
                            <option value="11">家電&amp;カメラ</option>
                            <option value="12">文房具・オフィス用品</option>
                            <option value="13">ホーム&amp;キッチン</option>
                            <option value="14">ペット用品</option>
                            <option value="15">ドラッグストア</option>
                            <option value="16">ビューティー</option>
                            <option value="17">ラグジュアリービューティー</option>
                            <option value="18">食品・飲料・お酒</option>
                            <option value="19">ベビー&amp;マタニティ</option>
                            <option value="20">ファッション</option>
                            <option value="21">___レディース</option>
                            <option value="22">___メンズ</option>
                            <option value="23">___キッズ＆ベビー</option>
                            <option value="24">服＆ファッション小物</option>
                            <option value="25">シューズ＆バッグ</option>
                            <option value="26">腕時計</option>
                            <option value="27">ジュエリー</option>
                            <option value="28">おもちゃ</option>
                            <option value="29">ホビー</option>
                            <option value="30">楽器</option>
                            <option value="31">スポーツ&amp;アウトドア</option>
                            <option value="32">車＆バイク</option>
                            <option value="33">DIY・工具・ガーデン</option>
                            <option value="34">大型家電</option>
                            <option value="35">クレジットカード</option>
                            <option value="36">ギフト券</option>
                            <option value="37">産業・研究開発用品</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control " id="name" name="name" value="" placeholder="名称" autofocus="">
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control " id="price" name="price" value="" placeholder="価格">
                    </div>

                    <div class="form-group">
                        <label for="description">説明</label>
                        <textarea class="form-control " id="description" name="description" placeholder="説明"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_path">イメージ</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path">
                    </div>

                    <hr class="mb-3">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="http://13.113.124.239/admin/products" class="btn btn-secondary">キャンセル</a>
                        </li>
                        <li class="list-inline-item">
                            <button type="submit" class="btn btn-primary">作成</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </main>
@endsection
