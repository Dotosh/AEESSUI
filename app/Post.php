<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    //users migration eloquent
    public function user(){

        return $this->belongsTo('App\User');

    }

    //photo migration eloquent
    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    //category table eloquent
    public function category(){

       return $this->belongsTo('App\Category');
    }
}
