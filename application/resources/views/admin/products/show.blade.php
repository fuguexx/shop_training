@extends('layouts.admin')

@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.products.index') }}" class="btn btn-light">一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">編集</a>
            </li>
            <li class="list-inline-item">
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        </ul>
        <!-- 途中-->

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>11</td>
                </tr>
                <tr>
                    <th>商品カテゴリ</th>
                    <td>Android アプリ</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>cumque sunt rerum magnam perferendis</td>
                </tr>
                <tr>
                    <th>価格</th>
                    <td>¥58,762</td>
                </tr>
                <tr>
                    <th>説明</th>
                    <td>Totam nobis aut aliquid commodi. Ea et cumque nam sequi. Explicabo delectus dolor facilis magnam voluptatem.</td>
                </tr>
                <tr>
                    <th>イメージ</th>
                    <td>
                        <img class="img-thumbnail" src="http://13.113.124.239/storage/product_images/GfrFEWvr2Fp5rSY4a8pkyKbcioo6lvWqty0SmJQZ.jpeg">
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
