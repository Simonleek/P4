@extends('_master')

@section('title')
	Edit Task Type
@stop


@section('content')

	{{ Form::model($tasktype, ['method' => 'put', 'action' => ['TaskTypeController@update', $tasktype->id]]) }}

		<h2>Update: {{ $tasktype->name }}</h2>

		<div class='form-group'>
			{{ Form::label('name', 'Type') }}
			{{ Form::text('name') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TaskTypeController@destroy', $tasktype->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop