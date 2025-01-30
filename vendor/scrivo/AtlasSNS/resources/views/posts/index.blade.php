@extends('layouts.login')

@section('content')

<body>
<div class="post">
                <form action="/create_post" method="post">
            {{ csrf_field() }}

    <p class="new-post">
<img src="{{ '/storage/' . Auth::user()->images}}" class="rounded-circle">
                    <input  class="textarea" type="textarea" name="post"  placeholder="投稿内容を入力してください">
                                    @if($errors->first('post'))
                    <p class="e">※{{$errors->first('post')}}</p>
                @endif
                    <!-- <input type='hidden' name='id' class="id"> -->
</p>
                    <p class="submit1">
        <input type ="image" name="submit" class="post" src="{{ asset('images/post.png') }}" alt=" 投稿">
                    </p>

            </form>
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


            @if (Auth::user()->id == $post->user_id)
<div class="icon-btn">
                <figure class="edit">
                    <img class="btn js-modal-open" post="{{$post->post}}" post_id="{{$post->id}}" src="{{ asset('images/edit.png') }}" alt="編集" >
                </figure>


                <figure class="trash-h">
                    <a href="/top/{{$post->post}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                    <div class='delete-icon'>
                    <img class='delete-2'  src="{{ asset('images/trash.png') }}" alt="削除" >
                    <img class='delete'  src="{{ asset('images/trash-h.png') }}" alt="削除" >
                    </div>
                </a>
            </figure>
            </div>
             @endif
</div>
</li>
</ul>
</div>
</body>

                @endforeach

    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
    <form action="/top" method='post'>
        <textarea class="post" name='upPost'></textarea>
        <input type='hidden' name='post_id' class="post_id">
        <div>
  <input type ="image" name="submit" class="post-btn" src="{{ asset('images/edit.png') }}" alt=" 投稿">
  </div>
        {{csrf_field()}}
    </form>
        </div><!--modal__inner-->
    </div><!--modal-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    $(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var post=$(this).attr('post');
    var post_id=$(this).attr('post_id');

    $('.post').text(post);
    $('.post_id').val(post_id);
    return false;
  });
//   $('.js-modal-close').on('click', function () {
//     $('.js-modal').fadeOut();
//     return redirect("/top");
//   });
});


</script>
<script>

document.getElementById('main').onclick = function () {
    var message = "外部ページの¥n http://xxx.yyy.zzz.co.jp/index.html ¥n を開きますか？";
  this.style.backgroundColor = "#3fb811";
};

</script>

@endsection
