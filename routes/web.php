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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');

Auth::routes();


//ログアウト中のページ
Route::post('/logout', 'Auth\LoginController@logout');


Route::get('/login', 'Auth\LoginController@login')->name('home');
Route::post('/login', 'Auth\LoginController@login');


// ユーザー登録
Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@register');


// 登録完了後の画面
Route::get('/added', 'Auth\RegisterController@added')->name('added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');



Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/search', function () {
        return view('search');
    });
    Route::get('/follow-list', function () {
        return view('follow-list');
    });

});
