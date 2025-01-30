<body class='register'>
<div class='gla'>

@section('content')

@extends('layouts.logout')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class='logout'>
    <div class='label'>

{!! Form::open() !!}

<P>新規ユーザー登録</P>

<div class="form">
<div class="username">user name</div>
{{ Form::text('username',null,['class' => 'input']) }}

<div class="e-mail">mail adress</div>
{{ Form::text('mail',null,['class' => 'input']) }}

<div class="password">password</div>
{{ Form::password('password',null,['class' => 'input']) }}

<div class="confirm">password confirm</div>
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
<div>
{{ Form::submit('LEGISTER',['input class' => 'btn btn-danger']) }}
</div>
<p crass=""><a class="link" href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
</body>
@endsection
