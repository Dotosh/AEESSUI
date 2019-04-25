@extends('layouts.blog-post')

{{--This is still not persisting--}}
@section('styles')

    <link rel="stylesheet" href="{{asset('css/adminmaster/customstyle.css')}}">

@stop

@section('content')



    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>


{{--    flash message--}}
    @if(\Illuminate\Support\Facades\Session::has('comment_message'))

        <p class="alert alert-success text-center" >{{session('comment_message')}}</p>

    @elseif(\Illuminate\Support\Facades\Session::has('reply_comment'))

        <p class="alert alert-success text-center" >{{session('reply_comment')}}</p>

    @endif

    <!-- Blog Comments -->

    @if(\Illuminate\Support\Facades\Auth::check())

{{--    Comment Form--}}
        <div class="well">

            {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store', 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

{{--        The post_id needs to be in the input to commit the data. Hence we are making it hidden--}}
{{--            All data in the form can be persist to the @store using the $request--}}
                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group ">
                    {!! Form:: label('body', 'Leave a Comment:',['class'=>'control-label col-lg-4 h4']) !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Comment here', 'rows'=>3]) !!}
                </div>

                <div class="form-group ">
                    {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

        </div>

    @endif

    <hr>

    <!-- Posted Comments -->
    @if(count($comments) > 0)

        @foreach($comments as $comment)

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">

{{--                Comment User's photo--}}
                <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">

{{--                Comment author--}}
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at}}</small>
                </h4>
{{--                comment body--}}
                <p>{{$comment->body}}</p>

                <hr>

{{--            Reply session,
                pulls the data from the relationship of comment and replies--}}
                @if(count($comment->replies) > 0)

                    @foreach($comment->replies as $reply)

{{--                        this condition displays only active comments--}}
                        @if($reply->is_active == 1)

                        <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">

{{--                 Reply User's photo--}}
                                    <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">

{{--                 Reply Author--}}
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at}}</small>
                                    </h4>

{{--                 Reply--}}
                                    {{$reply->body}}
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        @endif
                    @endforeach
                @endif


        @endforeach


                <hr>

                <div class="comment-reply-container">

{{--                    this hides the comment onclick click--}}

                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                    <div class="comment-reply" style="display: none">

{{--            Reply Form--}}

                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createreply', 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

{{--                make sure the id is pulled from the form else it return ...id cannot be null--}}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                            <div class="form-group ">
                                {!! Form:: label('body', 'Reply:', ['class'=>'control-label']) !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Reply to Comment', 'rows'=>1]) !!}
                            </div>

                            <div class="form-group ">
                                {!! Form::submit('Submit Reply', ['class'=>'btn btn-info']) !!}
                            </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

    @endif


@stop


@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {

            $(this).next().slideToggle("slow");

        });



    </script>
@stop