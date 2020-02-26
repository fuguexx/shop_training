@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <div class="row pt-3">
            <div class="col-sm">
                <form action="{{ url('admin/users') }}" method="POST"　enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" placeholder="名称" autofocus="">
                        @error('name')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control " id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
                        @error('email')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="パスワード">
                        @error('password')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">パスワード(確認)</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="パスワード(確認)">
                    </div>

                    <div class="form-group">
                        <label for="image_path">イメージ</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path">
                    </div>

                    <hr class="mb-3">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/admin/users') }}" class="btn btn-secondary">キャンセル</a>
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
