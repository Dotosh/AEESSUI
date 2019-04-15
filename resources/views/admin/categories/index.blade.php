@extends('layouts.admin');


@section('content')

<h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store', 'class'=>'form-validate', 'id'=>'feedback_form']) !!}

            <div class="form-group ">
                {!! Form:: label('name', 'Category Name:', ['class'=>'control-label col-lg-2', 'span'=>'*']) !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Category']) !!}
            </div>

            <div class="form-group ">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>


    <div class="col-sm-6">

        @if($categories)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
                </tr>

            @endforeach

            </tbody>
        </table>

        @endif

    </div>




@endsection




