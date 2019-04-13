<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        //get all available inputs
        $input = $request->all();

        //get the logged in user
        $user = Auth::user();

        //grab the photo_id from users table
        if ($file = $request->file('photo_id')){

//            return 'it works';

            //concatenate time ti filename
            $name = time() . $file->getClientOriginalName();

            //move named file to images folder, that wil b automatically created
            $file->move('img', $name);

            //main photo table column(key) having a value of filename frm users table
            $photo = Photo::create(['file'=>$name]);

            //equatin the user photo_id to the photo->id frm the main photos table
            $input['photo_id'] = $photo->id;

        }

        $user->posts()->create($input);

        Session::flash('Created_post', 'Post Created Successfully');


        return redirect('ads/posts');




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
//        Session::flash('Updated_post', 'Post Updated Successfully');

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
//        Session::flash('Deleted_post', 'Post Deleted Successfully');

    }
}
