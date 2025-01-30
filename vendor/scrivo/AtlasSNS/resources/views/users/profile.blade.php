@extends('layouts.login')

@section('content')
<body class="profile">
  <div class="profile-parts">
<img src="{{ '/storage/' . $user['images']}}" class='rounded-circle'/>
{!! Form::open(['url' => '/update', 'files' => true]) !!}
    @csrf
    @method('put')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="profile-list">
  {{ Form::label('user name',) }}
  {{ Form::text('username',$user->username,['class' => 'input']) }}
</div>
<div class="profile-list">
  {{ Form::label('mail adress') }}
  {{ Form::text('mail',$user->mail,['class' => 'input']) }}
</div>
<div class="profile-list">
{{ Form::label('password') }}

<input type='password' class='input' name='password'>
</div>
<div class="profile-list">
{{ Form::label('password confirm') }}

<input type='password' class='input' name='password_confirmation'>
</div>
<div class="profile-list">
  {{ Form::label('bio') }}
  {{ Form::text('bio',$user->bio,['class' => 'input']) }}
</div>
<div class="profile-list">
  {{ Form::label('icon image') }}
<!-- <form action="/upload" enctype="multipart/form-data" method="post"> -->
  <h class="h">

</h>
</div>

<label class="images" for="form-image">ファイルを選択</label>
<input type='file' id='form-image' class='input' name='images'>
    <!-- <input type="file" name="imgpath"> -->

<div class="">
 <input type="submit" value="更新" class=" btn btn-danger">
{!! Form::close() !!}
</div>
</div>

@endsection
</body>
