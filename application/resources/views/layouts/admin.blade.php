<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopping') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="/admin">{{ config('app.name', 'Shopping') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if(Auth::guard('admin')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('admin')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin/admin_users/'.Auth::guard('admin')->user()->id) }}">管理者情報編集</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                            <form id="logout-form" class="d-none" action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column" id="navMenus">
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(Request::url(), url('/admin/products')) !== false ? 'active' : null }}" href="/admin/products">
                                商品管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(Request::url(), url('/admin/product_categories')) !== false ? 'active' : null }}" href="/admin/product_categories">
                                商品カテゴリ管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(Request::url(), url('/admin/users')) !== false ? 'active' : null }}" href="/admin/users">
                                顧客管理
                            </a>
                        </li>
                        @can('viewAny', Auth::guard('admin')->user())
                            <li class="nav-item">
                                <a class="nav-link {{ strpos(Request::url(), url('/admin/admin_users')) !== false ? 'active' : null }}" href="/admin/admin_users">
                                    管理者管理
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
