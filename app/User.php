<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //ユーザーの投稿
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    //フォローしているユーザー
    public function following(){
          return $this->belongsToMany(
          'App\User','follows','following_id','followed_id');

    }
    //フォローするユーザー
    public function followed(){
          return $this->belongsToMany(
          'App\User','follows','followed_id','following_id');
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
        return redirect('/posts',['post'=>$post]);
    }


}
