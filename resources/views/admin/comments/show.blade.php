@extends('layouts.admin')


@section('content')


    @if(Session::has('deleted_comment'))

        <p class="alert alert-danger text-center" >{{session('deleted_comment')}}</p>

    @elseif(Session::has('updated_user'))

        <p class="alert alert-success text-center" >{{session('updated_comment')}}</p>

    @endif



    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>

                @foreach($comments as $comment)

                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{str_limit($comment->body, 10) }}</td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>

                        {{--                    the route is from the custom route post/{id}--}}
                        <td class="la"><a href="{{route('post', $comment->post->id)}}">View Post</a></td>

                        <td>
                            @if($comment->is_active == 1)

                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id], 'class'=>'form-validate']) !!}

                                <input type="hidden" name="is_active" value="0">

                                <div class="form-group ">
                                    {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                                </div>

                                {!! Form::close() !!}

                            @else

                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id], 'class'=>'form-validate']) !!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group ">
                                    {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                                </div>

                                {!! Form::close() !!}

                            @endif

                        </td>

                        <td>

                            {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id], 'class'=>'form-validate']) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group ">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}

                        </td>


                    </tr>

                @endforeach

            </tbody>
        </table>




    @else

        <h3 class="alert alert-danger text-center">No Comments</h3>

    @endif

@stop