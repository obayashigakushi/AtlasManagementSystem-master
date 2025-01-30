@extends('layouts.login')

@section('content')
<body class="profiles">
  <div class ="box">
  <div class="prof">
               @foreach($posts->unique('user_id') as $post)
               <img src="{{ '/storage/' . $post['images']}}" class='rounded-circle'/>
               <div class ="data">
                    <div class="name">name　　　　　　　　{{ $post->username }}</div>
                    <div class="bio">bio　　　　　　　　　{{ $post->bio }}</div>
                    </div>
               @endforeach
               @if($user->isFollowing()->where('following_id', Auth::id())->exists())
                        <div class="col-md-3">
                            <form action="{{ route('unfollows', $user) }}" method="POST">
                              @csrf
                                <input class="btn btn-danger" type="submit" value="フォロー解除">
                            </form>
                        </div>
                        @else
                                                <div class="col-md-3">
                            <form action="{{ route('follows', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー" class=" btn btn-primary">
                            </form>
                        </div>

                @endif
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
@endsection
</body>
