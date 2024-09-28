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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

use Illuminate\Support\Facades\Auth;

Auth::routes();


//ログアウト中のページーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー


//ログイン
Route::post('/login', 'Auth\LoginController@login');




// ユーザー登録
Route::post('/register', 'Auth\RegisterController@register');

//登録完了画面
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ ----------------------------------------------------------------------------------




// ミドルウェアでアクセス制限
Route::middleware(['auth'])->group(function () {

    Route::get('/posts','PostsController@index');
    Route::get('/profile','UsersController@profile');
    Route::get('/search','UsersController@search');

    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');

});