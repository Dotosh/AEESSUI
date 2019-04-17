@extends('layouts.admin')


@section('style')

    <link rel="stylesheet" href="{{'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css'}}">

@endsection


@section('content')

    <h1 class="text-center">Upload Media</h1>

    <div class="col-sm-6 container">

        {!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store', 'class'=>'dropzone mt-5', 'id'=>'feedback_form', 'files'=>true]) !!}


    </div>




@endsection


@section('script')

    <script src="{{'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'}}"></script>

@endsection