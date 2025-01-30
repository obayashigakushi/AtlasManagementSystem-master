<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';



        public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォロー
    public function isFollowing()
    {
       return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // フォローしている処理
    public function notFollowing()
    {
       return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    // フォロー解除
    public function isFollowed()
    {
       return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
}
