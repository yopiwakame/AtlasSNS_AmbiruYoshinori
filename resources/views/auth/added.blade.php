@extends('layouts.logout')

@section('content')

<div id="clear">

  <div class="added_title">
    <p>{{ $username }}さん</p>
    <p>ようこそ!AtlasSNSへ</p>
  </div>

  <div class="added_subtitle">
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう!</p>
  </div>

  <p class="btn btn-danger"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
