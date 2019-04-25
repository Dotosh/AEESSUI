<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

//this is the custom function that links Comment/Reply Route
    public function createreply(Request $request){

        $user = Auth::user();

        $data = [

//            comment data from $fillable
//        the $request refers to the form data
            'comment_id' => $request->comment_id,
            'author' => $user->name,
            'email' => $user->email,

//            there is still a shortcomming here. If user doesn't have a photo, comment will return error
//           try to fix it

            'photo' => $user->photo->file,
            'body' => $request->body

        ];


        CommentReply::create($data);

        $request->session()->flash('reply_comment', 'Reply Submitted Successfully! Awaiting Moderation');

//      the back() attribute returns it to the same page
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $comments = Comment::findOrFail($id);

        $replies = $comments->replies;

        return view('admin.comments.replies.show', compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        CommentReply::findOrFail($id)->update($request->all());

        Session:: flash('update_reply', 'Reply Successfully Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        CommentReply::findOrFail($id)->delete();

        Session::flash('deleted_reply', 'Reply Successfully Deleted');

        return redirect()->back();
    }
}
