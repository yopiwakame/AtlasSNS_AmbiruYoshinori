<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request)
    {
        // セッションからユーザー名を取得
        $username = $request->session()->get('username');

        // ビューにユーザー名を渡す
        return view('top', compact('username'));
    }
}
