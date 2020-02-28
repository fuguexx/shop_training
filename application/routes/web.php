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

Route::namespace('User')->as('users.')->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{product}', 'ProductController@show')->name('products.show');
});

Route::namespace('User')->as('users.')->middleware(['auth:user'])->group(function(){
    Route::get('users/edit/{users}', 'UserController@edit')->name('edit');
    Route::post('users/{users}', 'UserController@update')->name('update');
    Route::get('products/{product}/product_reviews/create', 'ProductReviewController@create')->name('product_review.create');
    Route::post('products/{product}/product_reviews', 'ProductReviewController@store')->name('product_review.store');
    Route::get('products/{product}/product_reviews/{product_review}/edit', 'ProductReviewController@edit')->name('product_review.edit');
    Route::post('products/{product}/product_reviews/{product_review}', 'ProductReviewController@update')->name('product_review.update');
});

Route::redirect('/', '/users/home');


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
