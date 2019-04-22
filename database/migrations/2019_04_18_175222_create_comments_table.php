<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->string('photo');
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->timestamps();

//            this creates constraints of comments on posts. Deletes the posts as well as their comments
//            make sure the data attributes in the constraints are identical e.g user_id is unsigned->index
//            Also make sure the migrations are ordered i.e if constraining posts on users,
//            then users table should be the first (on top of posts)
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
