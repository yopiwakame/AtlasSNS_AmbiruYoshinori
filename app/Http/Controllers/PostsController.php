<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Auth::routes();

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }
}
