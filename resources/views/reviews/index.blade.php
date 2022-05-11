@extends('layouts.app')
@section('content')
<link href="/css/app.css" rel="stylesheet">

    <h1>Reviews</h1>
    @if(count($reviews) > 0)
        @foreach($reviews as $review)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/reviews/{{$review->id}}">{{$review->body}}</a></h3>
                        {{$review->stars}}
                        <small>Written on {{$review->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No Reviews found</p>
    @endif
@endsection
