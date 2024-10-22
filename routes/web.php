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
use App\Http\Controllers\PostsController;


Auth::routes();


//ログアウト中のページーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー


//ログイン
Route::post('/login', 'Auth\LoginController@login');




// ユーザー登録
Route::post('/register', 'Auth\RegisterController@register');

//登録完了画面
Route::get('/added', 'Auth\RegisterController@added')->name('added');

//ログイン中のページ ----------------------------------------------------------------------------------




// ミドルウェアでアクセス制限
Route::middleware(['auth'])->group(function () {

    Route::get('/posts','PostsController@index');
    Route::get('/profile','UsersController@profile');
    //検索処理
    Route::get('/search','UsersController@search');
    //投稿処理
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts', [PostsController::class, 'index']);
    //投稿消去
    Route::get('/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');
    //投稿編集
    Route::post('/posts/authorCreate/{id}', [PostsController::class, 'authorCreate'])->name('posts.authorCreate');


    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');

});
