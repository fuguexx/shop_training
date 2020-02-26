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
Auth::routes();

Route::namespace('User')->group(function(){
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');
});

Route::namespace('User')->middleware(['auth:user'])->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('products/{product}/product_reviews/create', 'ProductReviewController@create');
    Route::post('products/{product}/product_reviews', 'ProductReviewController@store');
    Route::get('products/{product}/product_reviews/{product_review}/edit', 'ProductReviewController@edit');
    Route::post('products/{product}/product_reviews/{product_review}', 'ProductReviewController@update');
});

Route::redirect('/', '/home');


/*
（ログインページ/ログインアクション）では、middlewareのguestを使用し、認証済みの場合にそのページへは遷移しないように制御している
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
});

/*
adminログイン済みのユーザーのlogout、/admin/homeへの遷移ではmiddlewareのAuthで認証をかけている
*/
Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth:admin'])->group(function(){
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');
});

/*
adminログイン後のリダイレクト
*/
Route::redirect('/admin', '/admin/home');

Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth:admin'])->group(function(){
    Route::resource('products','ProductController');
    Route::resource('product_categories','ProductCategoryController');
    Route::resource('users','UserController');
    Route::resource('admin_users','AdminUserController');
});
