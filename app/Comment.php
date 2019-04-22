<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [

        'post_id',
        'is_active',
        'email',
        'photo',
        'body',
        'author'

    ];

    public function replies(){

//        comment has many replies
        return $this->hasMany('App\CommentReply');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function post(){

        return $this->belongsTo('App\Post');
    }

}
