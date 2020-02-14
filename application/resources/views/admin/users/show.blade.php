@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.users.index') }}" class="btn btn-light">一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('admin/users/'.$User->id.'/edit') }}" class="btn btn-success">編集</a>
            </li>
            <li class="list-inline-item">
                <form action="{{ url('admin/users/'.$User->id) }}" method="POST">
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
                    <td>{{ $User->id }}</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>{{ $User->name }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $User->email }}</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
