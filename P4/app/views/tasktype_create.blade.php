@extends('_master')

@section('title')
	Create a new Task Type
@stop


@section('content')

	<h1>Create a Task Type</h1><br/>
	{{ Form::open(array('action' => 'TaskTypeController@store')) }}	
			{{ Form::label('name','Task Type: ') }}
			{{ Form::text('name') }}
	{{ Form::submit('Add Task Type') }}
	{{ Form::close() }}
@stop