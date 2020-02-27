@extends('layouts.login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('users/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <input type ="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ユーザ名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                @error('password')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認)</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">イメージ</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file" id="image_path" name="image_path">

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="delete_image" name="delete_image" value="1">
                                    <label for="delete_image">削除</label>
                                </div>
                                <img class="img-thumbnail" width="100" src="{{ $photo }}" alt="イメージ画像">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                                <a class="btn btn-secondary" href="/home">
                                    キャンセル
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
