<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//this route pulls the post.blade bog
Route::get('/post/{id}', ['as'=>'post', 'uses'=>'AdminPostsController@post']);




Route::group(['middleware'=>'admin'], function (){

    Route::get('/ads ', function (){

        return view('admin.index');
    });

    Route::resource('ads/users', 'AdminUsersController');

    Route::resource('ads/posts', 'AdminPostsController');

    Route::resource('ads/categories', 'AdminCategoriesController');

    Route::resource('ads/media', 'AdminMediaController');

    Route::resource('ads/comments', 'PostCommentsController');

    Route::resource('ads/comment/replies', 'CommentRepliesController');

});


