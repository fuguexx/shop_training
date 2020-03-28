@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.users.index') }}" class="btn btn-light">一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-success">編集</a>
            </li>
            <li class="list-inline-item">
                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        </ul>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th style="width:10%;">イメージ</th>
                    <td style="width:90%;">
                        <img class="img-thumbnail" src="{{ $user->image_path }}">
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
