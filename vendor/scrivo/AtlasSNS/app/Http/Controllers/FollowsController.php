<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{

    //
    public function followList(){
 $users = User::query()->whereIn('id', Auth::user()->notFollowing()->pluck('followed_id'))->get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->notFollowing()->pluck('followed_id'))->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at','users.images')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();


        return view('follows.followList' , compact('posts', 'users'));
    }
    public function followerList(){
         $users = User::query()->whereIn('id', Auth::user()->isFollowing()->pluck('following_id'))->get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->isFollowing()->pluck('following_id'))->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at','users.images')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();

        return view('follows.followerList' , compact('posts', 'users'));
    }


    public function followCounts(){
        $followCounts = count(Follow::where('followed_id', Auth::user()->id)->get());

        return view('auth.login', compact('followCounts'));
        }

    public function show(Request $request, $user_id){
        $user = User::where('id',$user_id)->first();

        $posts = Post::query()->where('user_id', $user_id)->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at','users.images','users.bio','users.id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();


    return view(
        'users.profiles',
        [
             'user' => $user,
            'posts' => $posts

        ]
    );
        }


    public function follows(User $user) {
        $user->isFollowing()->attach(Auth::id());

        return back();
    }
    // フォロー解除
    public function unfollows(User $user)
    {
        $user->isFollowed()->detach(Auth::id());

        return back();

    }
}
