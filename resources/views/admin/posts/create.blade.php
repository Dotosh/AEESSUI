@extends('layouts.admin')



@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store', 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

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
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}


    @include('includes.form_error')

@stop