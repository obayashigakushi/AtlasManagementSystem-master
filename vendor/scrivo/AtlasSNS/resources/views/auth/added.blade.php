<div class='gla'>
<body class='added'>

@extends('layouts.logout')

@section('content')

<div class='logout'>
    <div class='label'>
  @csrf
  <div class="title">
  <p class="t">{{$username}}さん</p>
  <p class="t">ようこそ！AtlasSNSへ</p>
  </div>
  <div class="subtitle">
  <p class="hallow">ユーザー登録が完了しました。</p>
  <p class="hallow">早速ログインをしてみましょう！</p>
 </div>
 <a class="btn btn-danger" href="/login">ログイン画面へ</a>
</div>
</div>
</body>
</div>
@endsection
