@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.product_categories.index') }}" class="btn btn-light">一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('admin/product_categories/'.$ProductCategory->id.'/edit') }}" class="btn btn-success">編集</a>
            </li>
            <li class="list-inline-item">
                <form action="{{ url('admin/product_categories/'.$ProductCategory->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        </ul>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $ProductCategory->id }}</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>{{ $ProductCategory->name }}</td>
                </tr>
                <tr>
                    <th>並び順番号</th>
                    <td>{{ $ProductCategory->order_no }}</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
