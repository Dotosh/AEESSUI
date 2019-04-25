@extends('layouts.admin')


@section('content')


    @if(Session::has('deleted_reply'))

        <p class="alert alert-danger text-center" >{{session('deleted_reply')}}</p>

    @elseif(Session::has('updated_user'))

        <p class="alert alert-success text-center" >{{session('updated_reply')}}</p>

    @endif



    @if(count($replies) > 0)

        <h1>Replies</h1>

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

            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{str_limit($reply->body, 10) }}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>

                    {{--                    the route is from the custom route post/{id}--}}
                    <td class="la"><a href="{{route('post', $reply->comment->post->id)}}">View Post</a></td>

                    <td>
                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id], 'class'=>'form-validate']) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group ">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id], 'class'=>'form-validate']) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group ">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy', $reply->id], 'class'=>'form-validate']) !!}

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

        <h3 class="alert alert-danger text-center">No Replies</h3>

    @endif

@stop