<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $credentials = ['email' => $request->input('mail'), 'password' => $request->input('password')];
        if($request->isMethod('post')){

            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
               // ログイン成功後、ユーザー名をセッションに保存
                $user = Auth::user();
                $username = $user->username; // ユーザー名の取得
                return view('home')->with('username', $username);
            } else {
                // 認証に失敗した場合、エラーメッセージを表示
                return back()->withErrors([
                    'message' => 'メールアドレスまたはパスワードが間違っています。',
                ]);
            }
        }
        return view("auth.login");


    }

   public function logout(Request $request)
    {
        // ユーザーをログアウトさせる
        Auth::logout();

        // セッションを無効化
        $request->session()->invalidate();

        // CSRFトークンを再生成
        $request->session()->regenerateToken();

        // ログアウト後のリダイレクト
        return redirect('/login');
    }
}
