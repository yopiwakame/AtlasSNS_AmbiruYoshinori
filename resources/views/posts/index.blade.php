@extends('layouts.login')

@section('content')
 {!! Form::open(['url' => '/posts' ,'method' => 'post']) !!}
   <div class="form_group">
     <img src="images/icon1.png">
     {{ Form::input('text', 'post', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。']) }}
     <button type="submit" class="btn"><img src="images/post.png" alt=""></button>
   </div>
 {!! Form::close() !!}

  <h1>投稿一覧</h1>

  <!-- バリデーションのエラー  ------------>
  @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   <ul>
     @foreach($posts as $post)
       <li>{{ $post->post }} ({{ $post->created_at }})</li>
     @endforeach
   </ul>
@endsection
