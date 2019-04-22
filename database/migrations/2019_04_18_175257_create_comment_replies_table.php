<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('photo');
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->timestamps();

//            this creates constraints of comment replies on comments. Deletes the comments as well as their replies
//            make sure the data attributes in the constraints are identical e.g user_id is unsigned->index
//            Also make sure the migrations are ordered i.e if constraining posts on users,
//            then users table should be the first (on top of posts)
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replies');
    }
}
