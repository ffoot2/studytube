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
// Route::group(['middleware' => 'auth.very_basic', 'prefix' => ''], function() {

    Route::get('/', 'SearchWordsController@index');
    Route::get('movie/{id}', 'SearchWordsController@show');
    Route::get('/{name}', 'SearchWordsController@index2')->where('name', '.*')->name('movie.index2');

// });

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');