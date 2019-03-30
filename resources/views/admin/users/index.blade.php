@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))

        <p class="alert alert-danger text-center" >{{session('deleted_user')}}</p>

    @elseif(Session::has('Updated_user'))

        <p class="alert alert-success text-center" >{{session('Updated_user')}}</p>


    @elseif(Session::has('Created_user'))

        <p class="alert alert-success text-center" >{{session('Created_user')}}</p>

    @endif







        <h1>Users</h1>

<table class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <td>Role</td>
        <td>Status</td>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>

    @if($users)

        @foreach($users as $user)

            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td class="la"><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                {{--cabin -> diffForHumans()--}}
                <td>{{$user->created_at ->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>

        @endforeach


    @endif


    </tbody>
</table>

@stop