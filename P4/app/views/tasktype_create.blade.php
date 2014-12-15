@extends('_master')
{{---- This is the task type creation page for Assignment 4;  --}}
@section('title')
	Create a new Task Type
@stop
@section('content')
	<h1>Create a Task Type</h1><br/>
	{{ Form::open(array('action' => 'TaskTypeController@store')) }}	
			{{---- The only editable element in task type is name --}}
			{{ Form::label('name','Task Type: ') }}
			{{ Form::text('name') }} (5-50 char)
	{{ Form::submit('Add Task Type') }}&nbsp;{{ HTML::link('/tasktype', '(Cancel)') }}
	{{ Form::close() }} 
	{{---- To display the possible errors  --}}
	@foreach($errors->all() as $message)
		<div >* {{ $message }}</div>
	@endforeach
@stop