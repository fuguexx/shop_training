@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <div class="row pt-3">
            <div class="col-sm">
                <form action="{{ url('admin/admin_users') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" placeholder="名称" autofocus="">
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control " id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="パスワード">
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">パスワード(確認)</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="パスワード(確認)">
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="general" name="is_owner" value="0" checked="" @if( old('is_owner') === "0") checked @endif>
                        <label class="form-check-label" for="general">一般</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="owner" name="is_owner" value="1" @if( old('is_owner') === "1") checked @endif>
                        <label class="form-check-label" for="owner">オーナー</label>
                    </div>

                    <hr class="mb-3">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/admin/admin_users') }}" class="btn btn-secondary">キャンセル</a>
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
