@extends('_master')


@section('title')
	View Task Types
@stop


@section('content')


	<h2>Available task type </h2>


	<a href='/tasktype/create'>+ Add a new type</a>

	<br><br>

	@foreach($tasktypes as $tasktype)

		<div>
			{{ $tasktype->name }}
		</div>
		<div>
			Created: {{ $tasktype->created_at }}
			</div>

	<div>
	Last Updated: {{ $tasktype->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/tasktype/{{ $tasktype->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TaskTypeController@destroy', $tasktype->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}
	<hr>
	@endforeach
	


@stop