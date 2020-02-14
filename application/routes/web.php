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

/* adminログイン済みのユーザーのlogout、/admin/homeへの遷移ではmiddlewareのAuthで認証をかけている */
Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth:admin'])->group(function(){
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');
});

/* adminログイン後のリダイレクト */
Route::redirect('/admin', '/admin/home');

Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth:admin'])->group(function(){
    Route::resource('products','ProductController');
    Route::resource('product_categories','ProductCategoryController');
    Route::resource('users','UserController');
    Route::resource('admin_users','AdminUserController');
});
