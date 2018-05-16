@extends('main')

@section('title', '| Feed')

@section('content')
  <div class="row">
  	<div class="jumbotron">
      <h1 class="display-4">Your Feed</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class="lead">
        <a class="btn btn-success btn-lg" href="#" role="button">View Your Link</a>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">

      @foreach($links as $item)

      <h4>Link : {{ $item->link }}</h4>
      <p class="lead">Votes:{{ $item->votes }}</p>
      <p>Submitted By: User {{ $item->user_id }}</p>
      <a href="{{ route('upvote',['id'=>$item->id]) }}"><button type="button" class="btn btn-light">Upvote</button></a>
      <a href="{{ route('downvote',['id'=>$item->id]) }}"><button type="button" class="btn btn-dark">Downvote</button></a>
      <hr>

      @endforeach

  
    </div>

    <div class="col-md-3 d-flex justify-content-center">
      <p class="lead">!Sidebar!</p>

    </div>
  </div>
@endsection