<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }} "> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header class="inner">
        <div id = "head">
            <div class="header_left">
                <h1 class="atlas_log"><a href="/posts"><img src="images/atlas.png"></a></h1>
            </div>
            <div class="header_right">
                <p>{{ Auth::user()->username }}</p>
                <p>さん</p>
                <div class="arrow"></div>
                <img src="images/icon1.png">
            <div>
        </div>
    </header>
            <div id="row">
                <div id="container">
                    @yield('content')
                </div >
                <div id="side-bar">
                    <nav class="arrow_items">
                        <ul>
                            <li><a href="/posts">HOME</a></li>
                            <li><a href="/profile">プロフィール編集</a></li>
                         <li><a a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
                        </ul>
                    </nav>
                    <div id="confirm">
                        <p>{{Auth::user()->username }}さんの</p>
                        <div>
                            <p>フォロー数</p>
                            <p>{{ Auth::user()->following()->count() }}名</p>
                        </div>
                <p class="btn"><a href="follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followed()->count() }}名</p>
                </div>
                <p class="btn"><a href="follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="search">ユーザー検索</a></p>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
            $(function(){
                //クリックで動く
                $('.arrow').click(function(){
                    $(this).toggleClass('rotate');
                    $('.arrow_items').slideToggle();
                });
            });



            $(function(){
                // 編集ボタン(class="js-modal-open")が押されたら発火
                $('.js-modal-open').on('click',function(){
                    // モーダルの中身(class="js-modal")の表示
                    $('.js-modal').fadeIn();
                    // 押されたボタンから投稿内容を取得し変数へ格納
                    var post = $(this).attr('post');
                    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
                    var post_id = $(this).attr('post_id');

                    // 取得した投稿内容をモーダルの中身へ渡す
                    $('.modal_post').text(post);
                    // 取得した投稿のidをモーダルの中身へ渡す
                    $('.modal_id').val(post_id);
                    $('.modal__content form').attr('action', "{{ url('/posts/authorCreate') }}/" + post_id);
                    return false;

                });

                // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
                $('.js-modal-close').on('click',function(){
                    // モーダルの中身(class="js-modal")を非表示
                    $('.js-modal').fadeOut();
                    return false;
                });
            });

    </script>



</body>
</html>
