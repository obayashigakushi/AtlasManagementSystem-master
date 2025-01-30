<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [   // <---　追加
        'user_id', 'post',
    ];
    //     protected $table = 'posts';
    // protected $guarded = array('id');

        public function user()
    {
        return $this->belongsTo('App\User');
    }

        public function getEditPost(Int $user_id, Int $post_id)
    {
        return $this->where('user_id', $user_id)->where('id', $post_id)->first();
    }
    public function getPost($user_id){
        return $this->where('user_id',$user_id)->first();
    }
}
