@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.admin_users.index') }}" class="btn btn-light">一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('admin/admin_users/'.$adminUser->id.'/edit') }}" class="btn btn-success">編集</a>
            </li>
            @if(Auth::guard('admin')->user()->is_owner === 1 && Auth::guard('admin')->user()->id != $adminUser->id)
                <li class="list-inline-item">
                    <form action="{{ url('admin/admin_users/'.$adminUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </li>
            @endif
        </ul>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $adminUser->id }}</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>{{ $adminUser->name }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $adminUser->email }}</td>
                </tr>
                <tr>
                    <th>権限</th>
                    <td>
                        @if($adminUser->is_owner == "0")
                            一般</td>
                        @else
                            オーナー</td>
                        @endif
                </tr>
            </tbody>
        </table>
    </main>
@endsection
