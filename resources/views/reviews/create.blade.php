@extends('layouts.app')

@section('content')
<link href="/css/app.css" rel="stylesheet">

  <div class="formtwo">
    <h1>Create Review</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\ReviewsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::label('stars', 'Stars')}}
            {{Form::text('stars', '', ['class' => 'form-control', 'placeholder' => 'Stars'])}}

            {{Form::label('body', 'Body')}}
            {{Form::text('body', '', ['class' => 'form-control', 'placeholder' => 'review'])}}
        {{Form::text('placeid', $placeid, ['style' => 'display:none', 'placeholder' => 'placeid'])}}
        {{Form::submit('Submit', ['class'=>'button'])}}
    {!! Form::close() !!}
  </div>
@endsection
