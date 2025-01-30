@extends('layouts.login')

@section('content')
<body class="follow">
  <div class="box">
                <div class="icon-list">
               @foreach($users->unique('id') as $user)
 <a href="{{ route('users.profiles',['user_id'=>$user->id])}}"><img src="{{ '/storage/' . $user['images']}}" class='rounded-circle'/></a>
               @endforeach
</div>
</div>
                @foreach($posts as $post)
                <div>
                <ul class="post-section">
                <li class="post-block">


             <figure><img class="rounded-circle" src="{{ asset('storage/' . $post->images ) }}" ></figure>
                  <div class="post-content">
                      <div>
                    <div class="post-name">{{ $post->username }}</div>
                    <div class="created-at">{{ $post->created_at }}</div>

                    </div>
                    <div class="post-post">{{ $post->post }}</div>

</div>
</li>
</ul>
</div>

               @endforeach
               </body>
@endsection
