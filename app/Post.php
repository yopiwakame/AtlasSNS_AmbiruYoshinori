<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model {


     //テーブル名を指定
    protected $table = 'posts';




    protected $fillable = ['user_id', 'post'];
    
    
}
