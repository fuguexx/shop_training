@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <form class="shadow p-3 mt-3" action="{{ route('admin.admin_users.index') }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" placeholder="名称">
                </div>
                <div class="col-md mb-3">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $email }}" placeholder="メールアドレス">
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-all" name="authority" value="all" checked="" @if( $authority === "all") checked @endif>
                        <label class="form-check-label" for="authority-all">すべての権限</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-owner" name="authority" value="owner" @if( $authority === "owner") checked @endif>
                        <label class="form-check-label" for="authority-owner">オーナー</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="authority-general" name="authority" value="general" @if( $authority === "general") checked @endif>
                        <label class="form-check-label" for="authority-general">一般</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="sort">
                        <option value="id-asc" selected="" @if( $sort == "id-asc") selected @endif>並び替え: ID昇順</option>
                        <option value="id-desc" @if( $sort == "id-desc") selected @endif>並び替え: ID降順</option>
                        <option value="name-asc" @if( $sort == "name-asc") selected @endif>並び替え: 名称昇順</option>
                        <option value="name-desc" @if( $sort == "name-desc") selected @endif>並び替え: 名称降順</option>
                        <option value="email-asc" @if( $sort == "email-asc") selected @endif>並び替え: メールアドレス昇順</option>
                        <option value="email-desc" @if( $sort == "email-desc") selected @endif>並び替え: メールアドレス降順</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <select class="custom-select" name="pageUnit">
                        <option value="10" selected="" @if( $pageUnit == "10") selected @endif>表示: 10件</option>
                        <option value="20" @if( $pageUnit == "20") selected @endif>表示: 20件</option>
                        <option value="50" @if( $pageUnit == "50") selected @endif>表示: 50件</option>
                        <option value="100" @if( $pageUnit == "100") selected @endif>表示: 100件</option>
                    </select>
                </div>
                <div class="col-sm mb-3">
                    <button type="submit" class="btn btn-block btn-primary">検索</button>
                </div>
            </div>
        </form>
        @if(Auth::guard('admin')->user()->is_owner === 1)
            <ul class="list-inline pt-3">
                <li class="list-inline-item">
                    <a href="{{ route('admin.admin_users.create') }}" class="btn btn-success">新規</a>
                </li>
            </ul>
        @endif
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
                    @foreach($adminUsers as $adminUser)
                        <tr>
                            <td>{{ $adminUser->id }}</td>
                            <td><a href="{{ url('admin/admin_users/'.$adminUser->id) }}">{{ $adminUser->name }}</a></td>
                            <td>{{ $adminUser->email }}</td>
                            <td>
                                @if($adminUser->is_owner == "0")
                                    一般</td>
                                @else
                                    オーナー</td>
                                @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    {{ $adminUsers->appends(['name' => $name, 'email' => $email, 'authority' => $authority ,'sort' => $sort, 'pageUnit' => $pageUnit])->links() }}
                </ul>
            </nav>
        </div>
    </main>
@endsection
