@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <form class="shadow p-3 mt-3" action="{{ route('admin.users.index') }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="名称">
                </div>
                <div class="col-md mb-3">
                    <input type="text" class="form-control" id="email" name="email" value="" placeholder="メールアドレス">
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-all" name="authority" value="all" checked="">
                        <label class="form-check-label" for="authority-all">すべての権限</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-owner" name="authority" value="owner">
                        <label class="form-check-label" for="authority-owner">オーナー</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-general" name="authority" value="general">
                        <label class="form-check-label" for="authority-general">一般</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="sort">
                        <option value="id-asc" selected="">並び替え: ID昇順</option>
                        <option value="id-desc">並び替え: ID降順</option>
                        <option value="name-asc">並び替え: 名称昇順</option>
                        <option value="name-desc">並び替え: 名称降順</option>
                        <option value="email-asc">並び替え: メールアドレス昇順</option>
                        <option value="email-desc">並び替え: メールアドレス降順</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="pageUnit">
                        <option value="10" selected="">表示: 10件</option>
                        <option value="20">表示: 20件</option>
                        <option value="50">表示: 50件</option>
                        <option value="100">表示: 100件</option>
                    </select>
                </div>
                <div class="col-sm mb-3">
                    <button type="submit" class="btn btn-block btn-primary">検索</button>
                </div>
            </div>
        </form>
        <ul class="list-inline pt-3">
            <li class="list-inline-item">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">新規</a>
            </li>
        </ul>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>メールアドレス</th>
                        <th>権限</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="http://13.113.124.239/admin/admin_users/1">オーナー管理者</a></td>
                        <td>owner@a.com</td>
                        <td>オーナー</td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">

                </ul>
            </nav>
        </div>
    </main>
@endsection
