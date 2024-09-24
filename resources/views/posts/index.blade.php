@extends('layouts.login')

@section('content')
 {!! Form::open(['url' => '/author/create']) !!}
   <div class="form_group">
     <img src="images/icon1.png">
     {{ Form::input('text', 'authorName', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。']) }}
     <button type="submit" class="btn"><img src="images/post.png" alt=""></button>
   </div>
 {!! Form::close() !!}

@endsection
