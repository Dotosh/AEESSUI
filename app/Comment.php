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
        'body'

    ];

    public function replies(){

//        comment has many replies
        return $this->hasMany('App\CommentReply');

    }
}
