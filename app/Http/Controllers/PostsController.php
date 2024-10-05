<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Posts;
Auth::routes();

class PostsController extends Controller
{
    //
      public function index(Request $request) // $request を引数に追加
    {
          // 投稿一覧を取得
        $posts = Post::all(); // モデルPostを使用して全ての投稿を取得
        return view('posts.index', compact('posts'));
    }


        public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => 'required|string|max:400',
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
