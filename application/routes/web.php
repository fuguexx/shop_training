<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index')->name('home');

/* admin ログインページへのリダイレクト */
Route::redirect('/', '/home');

/* （ログインページ/ログインアクション）では、middlewareのguestを使用し、認証済みの場合にそのページへは遷移しないように制御している */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
});

/* adminログイン済みのユーザーのlogout、/admin/homeへの遷移ではmidllewareのAuthで認証をかけている */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');
});

/* adminログイン後のリダイレクト */
Route::redirect('/admin', '/admin/home');

/* 管理側の機能をまとめる（ 例： prefix：viewのパスがadmin/products, namespace:controllerはAdmin/Productcontroller, as:admin.products.のように
　　パスに名前をつけている） */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function(){
    /* 商品管理機能*/
    Route::resource('products','ProductController')->middleware('auth:admin');

    /*　商品カテゴリ管理機能 */
    Route::resource('product_categories','ProductCategoryController')->middleware('auth:admin');

    /* 顧客管理機能 */
    Route::resource('users','UserController')->middleware('auth:admin');

    /* 管理者管理機能 */
    Route::resource('admin_users','AdminUserController')->middleware('auth:admin');
});
