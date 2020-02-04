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

/* admin認証不要 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
});

/* adminログイン後 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');
});

/* adminログイン後のリダイレクト */
Route::redirect('/admin', '/admin/home');

/* 商品管理機能*/
Route::resource('/admin/products','ProductController');

/*　商品カテゴリ管理機能 */
Route::resource('/admin/product_categories','ProductController');

/* 顧客管理機能 */
Route::resource('/admin/users','UserController');

/* 管理者管理機能 */
Route::resource('/admin/admin_users','Admin_UserController');
