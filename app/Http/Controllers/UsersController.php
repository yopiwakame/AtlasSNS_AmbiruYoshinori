<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    
        
        
    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
             $post = Post::where('post','like', '%'.$keyword.'%')->get();
        }else{
             $post = Post::all();
        }
        // 3つ目の処理
        return redirect('/users.search',['post'=>$post]);
    }
        
}
