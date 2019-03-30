@extends('layouts.admin')


@section('content')



    <h1 class="text-center">Admin Edit User</h1>

<div class="row">
    <div class="col-sm-2">

        <img height="80" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="col-sm-10">

        {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id], 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

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
            {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
            {!! Form:: label('password', 'Password',['class'=>'control-label col-lg-2', 'span'=>'*']) !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
        </div>


        <div class="form-group ">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}



        {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id], 'class'=>'form-validate', 'id'=>'feedback_form', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
            </div>

        {!! Form::close() !!}
    </div>

</div>

    @include('includes.form_error')

@endsection