@extends('layouts.admin')



@section('content')



    @if(Session::has('Deleted_post'))

        <p class="alert alert-danger text-center" >{{session('Deleted_post')}}</p>

    @elseif(Session::has('Updated_post'))

        <p class="alert alert-success text-center" >{{session('Updated_post')}}</p>


    @elseif(Session::has('Created_post'))

        <p class="alert alert-success text-center" >{{session('Created_post')}}</p>

    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td class="la"><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized' }}</td>
                    <td>{{$post->title}}</td>

                    {{--                limit the lenght of the body text displayed--}}
                    <td>{{str_limit($post->body, 100)}}</td>

                    <td class="la"><a href="{{route('post', $post->id)}}">View Post</a> </td>
                    <td class="la"><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach
        @endif

        </tbody>
    </table>

@stop