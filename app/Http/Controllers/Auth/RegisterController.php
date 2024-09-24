<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/posts';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request){



        if($request->isMethod('post')){

              $request->validate([
                'username' => [
                    'required',//入力必須
                    'string',  //文字列
                    'min:2',   //２文字以上
                    'max:12',  //12文字以内

                ],
                'mail' => [
                    'required', // 入力必須
                    'string',   //文字列
                    'min:5' ,   //5文字以上
                    'max:40',   //40文字以内
                    'email',    //正しいメール形式
                    'unique:users,mail' //登録済みメールは不可
                ],
                'password' => [
                 'required',//入力必須
                 'string',//文字列
                 'min:8', // 最小8文字
                 'max:20', // 最大20文字
                 'regex:/^[a-zA-Z0-9]+$/', // 英数字のみ
                 'confirmed' // パスワード確認フィールドと一致する必要あり
                ],
            ]);

            // ユーザー入力を取得
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
             // 新しいユーザーをデータベースに作成
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            // ユーザー名をセッションに保存してリダイレクト
            return redirect()->route('added')->with('username', $username);
        }
        return view('auth.register');
    }

    public function added(){
       // セッションからusernameを取得してビューに渡す
       $username = session('username');

         // セッションが空の場合、registerページにリダイレクト
     if (!$username) {
         return redirect()->route('register');
        }

       return view('auth.added', compact('username'));
    }
}
