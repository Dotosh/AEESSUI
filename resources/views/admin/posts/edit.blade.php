@extends('layouts.admin')



@section('content')

    <h1 class="text-center">Admin Edit Post</h1>

<div class="row">

    <div class="col-sm-2">

        <img height="80" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>


    <div class="col-sm-10">
        {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id], 'class'=>'form-validate', 'files'=>true]) !!}

        <div class="form-group ">
            {!! Form:: label('title', 'Title:',['class'=>'control-label col-lg-2', 'span'=>'*']) !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter the post Title']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('category_id', 'Category:', ['class'=>'control-label col-lg-2']) !!}
            {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control', 'id'=>'category']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('body', 'Description:',['class'=>'control-label col-lg-2']) !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
        </div>


        <div class="form-group ">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id], 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>

    @include('includes.form_error')

@stop