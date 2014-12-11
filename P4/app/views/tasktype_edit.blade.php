@extends('_master')

@section('title')
	Edit Task Type
@stop


@section('content')

	{{ Form::model($tasktype, ['method' => 'put', 'action' => ['TaskTypeController@update', $tasktype->id]]) }}

		<h1>Update Task Type: {{ $tasktype->name }}</h1><br/>
			{{ Form::label('name', 'Task Type: ') }}
			{{ Form::text('name') }}
		{{ Form::submit('Update') }}

	{{ Form::close() }}
	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TaskTypeController@destroy', $tasktype->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop