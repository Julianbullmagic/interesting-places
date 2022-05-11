@extends('layouts.app')

@section('content')
<link href="/css/app.css" rel="stylesheet">

    <h1>Edit Review</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\ReviewsController@update', $review->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('stars', 'Stars')}}
            {{Form::text('stars', $review->stars, ['class' => 'form-control', 'placeholder' => 'Stars'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $review->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        @if(!Auth::guest())
            @if(Auth::user()->id == $review->user_id)
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!!Form::open(['action' => ['App\Http\Controllers\ReviewsController@destroy', $review->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
    @endif
    {!! Form::close() !!}
@endsection
