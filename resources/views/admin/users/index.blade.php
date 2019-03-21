@extends('layouts.admin')


@section('content')



<h1>User</h1>

<table class="table table-condensed">
    <thead>
    <tr>
        <th>Id</th>
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
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
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