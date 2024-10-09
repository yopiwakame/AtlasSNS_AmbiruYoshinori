<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
Auth::routes();

use App\Post;

use App\User;

class PostsController extends Controller
{
    //
      public function index(Request $request)
    {
          // 投稿一覧を取得
        $posts = Post::all(); // モデルPostを使用して全ての投稿を取得
        return view('posts.index', compact('posts'));
    }


        public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => [
                 'required',//入力必須
                 'min:1',   //1文字以上
                 'max:150'  //150文字以内
            ]
        ]);

        // データベースに投稿を保存
         Post::create([
            'user_id' => auth()->id(),  // ログインしているユーザーIDを保存
            'post' => $request->input('post'),
        ]);

        // 投稿一覧ページにリダイレクト
        return redirect('/posts')->with('success', '投稿が保存されました。');
    }
}
