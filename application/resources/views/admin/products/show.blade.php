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
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        </ul>

        <table class="table" style="width:100%;">
            <tbody>
                <tr>
                    <th style="width:10%;">ID</th>
                    <td style="width:90%;">{{ $product->id }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">商品カテゴリ</th>
                    <td style="width:90%;">{{ $categoryName->ProductCategory->name }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">名称</th>
                    <td style="width:90%;">{{ $product->name }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">価格</th>
                    <td style="width:90%;">¥{{ number_format($product->price) }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">説明</th>
                    <td style="width:90%;">{{ $product->description }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">イメージ</th>
                    <td style="width:90%;">
                        <img class="img-thumbnail" src="{{ $photo }}">
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
