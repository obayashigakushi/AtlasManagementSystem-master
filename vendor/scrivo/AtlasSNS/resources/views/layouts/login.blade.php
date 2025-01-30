<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

    <header>
        <div id = "head">
            <div class="">
        <a href="/top"><img class="atlas" src="/images/atlas.png"></a>
</div>
                <div id="">







<div class="menu">
  <input type="checkbox" id="menu_bar01">
  <label for="menu_bar01"><p class="auth-name">{{Auth::user()->username}}　さん<img src="{{ '/storage/' . Auth::user()->images}}" class="rounded-circle"></p></label>
  <ul id="links01">

                    <li class="login-bar"><a class="link" href="/top">HOME</a></li>
                    <li class="login-bar"><a class="link" href="/profile">プロフィール編集</a></li>
                    <li class="login-bar"><a class="link" href="/logout">ログアウト</a></li>
  </ul>

</div>

    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >

        <div class="side-bar">
            <div class="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div class="follow-count">
                <p>フォロー数</p>
                <p>{{ Auth::user()->notFollowing()->get()->count() }}名</p>
                </div>
<p class="btn-follow"><a class="btn btn-primary" href="/followList" role="button">フォローリスト</a></p>
                <div class="follow-count">
                <p>フォロワー数</p>
                <p>{{ Auth::user()->isFollowed()->get()->count() }}名</p>
                </div>
<p class="btn-follow"><a class="btn btn-primary" href="/followerList" role="button">フォロワーリスト</a></p>
            </div>
            <div class="search-line">
<p class="btn-search"><a class="btn btn-primary" href="/search" role="button">ユーザー検索</a></p>
</div>
        </div>
    </div>

    <footer>
    </footer>

    <script src="{{ asset('js/app.js') }} "></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
