@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Admin Create page</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

        <div class="form-group ">
            {!! Form:: label('name', 'Full Name',['class'=>'control-label col-lg-2', 'span'=>'*']) !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Fullname', 'minlength'=>5]) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('email', 'E-Mail', ['class'=>'control-label col-lg-2', 'placeholder'=>'Enter E-mail', 'span'=>'*']) !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'cemail', 'placeholder'=>'Enter your email']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('role_id', 'Role', ['class'=>'col-lg-2']) !!}
            {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form::label('is_active', 'Status', ['class'=>'col-lg-2']) !!}
            {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('file', 'Upload') !!}
            {!! Form::file('file', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('password', 'Password',['class'=>'control-label col-lg-2', 'span'=>'*']) !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
        </div>


        <div class="form-group ">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}


    @include('includes.form_error')

@endsection