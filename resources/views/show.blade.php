@extends('main')

@section('title', '| The Links')

@section('content')
  <div class="justify-content-center">
  	<h1>Your link is</h1>
  	<p>{{ $link->link }}</p>

  	<p>It is the {{$link->id}} numbered link.</p>
  	

  </div>
@endsection