<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

        public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }

    // フォローする
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
