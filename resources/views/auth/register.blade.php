@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register', 'method' => 'post','class'=> 'from_login  from_register']) !!}

<h2>新規ユーザー登録</h2>
  <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('新規登録',['class' => 'btn btn-danger']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
