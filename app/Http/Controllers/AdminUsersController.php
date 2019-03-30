<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UsersRequest $request)
    {
        //
//                return $request->all();

//        User::create($request->all());
//        redirect('/ads/users');

        //trim deletes all spaces

        if (trim($request->password) == ''){
//          $input = $request->only('password');
            $input = $request->except('password');

        } else {

            $input = $request->all();
        }


        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('img', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        Session::flash('Created_user', 'User Successfully Created');

        return redirect('/ads/users');

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

        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
//        return $request->all();

        $user = User::findOrFail($id);

        if (trim($request->password) == ''){
//          $input = $request->only('password');
            $input = $request->except('password');

        } else {

            $input = $request->all();
        }


        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('img', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        };

        //this encrypts the password
        $input['password'] = bcrypt($request->password);

        $user->update($input);

        Session::flash('Updated_user', 'User Updated Successfully');

        return redirect('/ads/users');
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
//        return ('DESYTROY0');

        $user = User::findOrFail($id);

        //this deletes user from database including the image
        //the image path should be included but there is an accessor used -
        //unlink(public_path().'/img' . $user->photo->file)
        if ($user->photo){

            unlink(public_path() . $user->photo->file);

        }

        $user->delete();

        //the Session Facade alerts a message in the index blade
        Session::flash('deleted_user', 'User Deleted Successfully');

        return redirect('/ads/users');
    }
}
