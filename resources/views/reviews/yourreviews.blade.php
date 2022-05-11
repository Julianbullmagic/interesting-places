@extends('layouts.app')
@section('content')
<link href="/css/app.css" rel="stylesheet">
<div id="yourreviews">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <h1>Your Reviews</h1>
  @if(count($reviews) > 0)
  @foreach($reviews as $review)
  <div class="reviewdiv">
    @for ($i = 1; $i <= 5; $i++)
    @if($i<=(int)$review->stars)
    <div class="fa fa-star checked"></div>
    @else
    <div class="fa fa-star"></div>
    @endif
    @endfor
    <h3 style="margin-left:2vw;display:inline">{{$review->body}}</h3>
    <a href='/reviews/{{$review->id}}/edit'><button>Edit</button></a>
    <small>Written on {{$review->created_at}}</small>
  </div>
  @endforeach
  @else
  <p>No Reviews found</p>
</div>
@endif
@endsection
