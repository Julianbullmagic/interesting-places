@extends('layouts.app')

@section('content')
    <a href="/reviews" class="btn btn-default">Go Back</a>

    <div>
        {{$review->body}}
        {{$review->stars}}

    </div>
    <hr>
    <small>Written on {{$review->created_at}}</small>
    <hr>
@endsection
