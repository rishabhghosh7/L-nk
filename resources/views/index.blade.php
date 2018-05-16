@extends('main')

@section('title', '| The Links')

@section('content')
  <div class="row">
  	<div class="col-md-8">

  		@foreach($links as $link)
	  		<h4>Votes : {{ $link->votes }}</h4>
	  		<p>{{ $link->link }}</p>



	  		<a href="{{ route('upvote',['id'=>$link->id]) }}"><button type="button" class="btn btn-light">Upvote</button></a>
  			<a href="{{ route('downvote',['id'=>$link->id]) }}"><button type="button" class="btn btn-dark">Downvote</button></a>
  			<a href="{{ route('share',['id'=>$link->id]) }}"><button type="button" class="btn btn-primary">Share</button></a>
        {{ Form::open(['route'=>['links.destroy',$link->id],'method'=>'DELETE']) }}
        
        {{ Form::submit('Delete',['class'=>'btn btn-danger'])}}

        {{ Form::close() }}

  	  	<hr>
  		@endforeach
  		{{ $links->links() }}
  	</div>
  	<div class="col-md-4 d-flex justify-content-center">
  		<p>
  			Sidebar!
  		</p>
  	</div>
  </div>
@endsection