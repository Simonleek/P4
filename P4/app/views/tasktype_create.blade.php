@extends('_master')

@section('title')
	Create a new Task Type
@stop


@section('content')

	<h1>Create a Task Type</h1>

	{{ Form::open(array('action' => 'TaskTypeController@store')) }}

		<div>
			{{ Form::label('name','Type Name') }}
			{{ Form::text('name') }}
		</div>

		<br><br>
		{{ Form::submit('Add TaskType') }}

	{{ Form::close() }}

@stop