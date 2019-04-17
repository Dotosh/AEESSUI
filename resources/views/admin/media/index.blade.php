@extends('layouts.admin')


@section('content')


    @if(Session::has('Deleted_photo'))

        <p class="alert alert-danger text-center" >{{session('Deleted_photo')}}</p>

    @elseif(Session::has('Created_photo'))

        <p class="alert alert-success text-center" >{{session('Created_photo')}}</p>

    @endif


    <h1>Media</h1>

    @if($photos)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy', $photo->id], 'files'=>true]) !!}

                            <div class="form-group ">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @endif



@endsection