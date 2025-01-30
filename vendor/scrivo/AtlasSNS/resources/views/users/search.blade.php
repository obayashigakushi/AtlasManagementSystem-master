@extends('layouts.login')

@section('content')
<body class="search">
    <div class="box">

<form action="{{url('/search')}}" method="GET">
    <div class="form">
    <p><input class="text" type="text" name="word" placeholder="　　ユーザー名"></p>
    <p><input type ="image" name="submit" class="search-icon" src="{{ asset('images/search.png') }}" alt=" 検索"></p>
@if((isset($_GET['word'])))
    <p class="search-word">検索ワード:　{{$word}}</p>
 @endif
    </div>
</form>

</div>
                @foreach ($all_users as $user)
                    <div class="search-list">
<div>
<img src="{{ '/storage/' . $user['images']}}" class='rounded-circle'/>
</div>
                            <div class="user-box">
                                <p class="username">{{ $user->username }}</p>
                            </div>

@if($user->isFollowing()->where('following_id', Auth::id())->exists())

                        <div class="follow-btn">
                            <form action="{{ route('unfollow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー解除" class=" btn btn-danger">
                            </form>
                        </div>
                        @else
                                                <div class="follow-btn">
                            <form action="{{ route('follow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー" class=" btn btn-primary">
                            </form>
                        </div>


                @endif
                </div>
                @endforeach

</body>
@endsection
