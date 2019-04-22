@extends('layouts.admin');


@section('content')

    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update', $category->id], 'class'=>'form-validate']) !!}

        <div class="form-group ">
            {!! Form:: label('name', 'Category Name:', ['class'=>'control-label col-lg-2']) !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Category']) !!}
        </div>

        <div class="form-group ">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    @include('includes.form_error')

    <div>

{{--        Delete Category form--}}
        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

    </div>

@endsection