<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Follow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{


           public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::latest()

$posts = Post::query()->whereIn('user_id', Auth::user()->notFollowing()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at','users.images')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();
        return view('posts.index', compact('posts'));

    }

    public function create(Request $request)
    {
                $validator = $request->validate([
            'post' => ['required', 'string', 'min:1', 'max:200'],
        ]);
        Post::create([

            'user_id' => Auth::user()->id,
            'post' => $request->input('post'),
        ]);
        return back();

    }

    //ツイート編集処理
    public function update(Request $request)
    {
      $id = $request->input('post_id');
      $up_post = $request->input('upPost');
    \DB::table('posts')
      ->where('id', $id)
      ->update(
        ['post' => $up_post]
      );

      return redirect('/top');
    }

    public function delete($post)
    {
        \DB::table('posts')
            ->where('post', $post)
            ->delete();

        return redirect('/top');
    }

}
