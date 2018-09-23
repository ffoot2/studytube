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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::prefix('admin')->name('admin.')->group(function() {
    // For admin auth pages as generated by Auth::routes();
    // See also: https://stackoverflow.com/a/39197278/4821980

    // Authentication Routes...
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');
    
    // // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Password Reset Routes...
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    //  Route::get('/login', 'AdminController@index');
    // Route::get('/home', 'AdminController@index');
    Route::get('/', 'AdminController@index')->name('admin.index');
    //  Route::get('/admin/home', 'AdminController@index');

    //管理画面関係（カテゴリ）
    Route::get('/', 'Admin\CategoryController@index');
    Route::get('/create', 'Admin\CategoryController@create')->name('create');
    Route::post('/', 'Admin\CategoryController@store')->name('store');
    Route::get('/edit', 'Admin\CategoryController@edit')->name('edit');
    Route::put('/{id}', 'Admin\CategoryController@update')->name('update');
    Route::delete('/', 'Admin\CategoryController@destroy')->name('destroy');
    
});

// Route::group(['middleware' => 'auth.very_basic', 'prefix' => ''], function() {
    Route::get('profile', 'ProfileController@editProfile')->name('profile.get');
    Route::put('profile', 'ProfileController@updateProfile');

    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    Route::get('/', 'SearchWordsController@index');
    Route::get('movie/{id}', 'SearchWordsController@showMovie');
    Route::get('/{name}', 'SearchWordsController@onclickSearchWord')->where('name', '.*')->name('movie.onclickSearchWord');
   
    
    
// });

