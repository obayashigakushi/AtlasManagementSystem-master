<body class="login">
<div class='gla'>
@extends('layouts.logout')

@section('content')

<div class='logout'>
  <div class='label'>
  {!! Form::open() !!}

  <p class="p">AtlasSNSへようこそ</p>
<div class="form">
<div class="e-mail">mail adress</div>
{{ Form::text('mail',null,['class' => 'input']) }}
<div class="password">password</div>
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['input class' => 'btn btn-danger']) }}

<p><a  class="link" href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
</body>


@endsection
