@extends('main')

@section('title', '| Create')

@section('content')
	{{ Form::open(['route'=>'links.store']) }}

    {{ Form::label('link', 'Your Link') }}
    {{ Form::url('link',null,['class'=>'form-control']) }}

    {{ Form::submit('Save', array('class' => 'btn btn-success btn-block')) }}

    {{ Form::close() }}
@endsection