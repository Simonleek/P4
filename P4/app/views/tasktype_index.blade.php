@extends('_master')
{{---- This is the index page that list all the task types -----}}
@section('title')
	View Task Types
@stop
@section('content')
	<h1>Available Task Types </h1>
	<a href='/tasktype/create'>+ Add a New Type +</a>
	<br/><hr>
	{{---- This loop through all task types and displays edit or delete -----}}
	@foreach($tasktypes as $tasktype) 
		Type Name:  {{ $tasktype->name }}&nbsp;(<a href='/tasktype/{{ $tasktype->id }}/edit'>Edit</a>)
		<br />
		Created at: {{ $tasktype->created_at }}
		<br />
		Last Updated: {{ $tasktype->updated_at }}
		<br />	
		{{ Form::open(['method' => 'DELETE', 'action' => ['TaskTypeController@destroy', $tasktype->id]]) }}
			<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
		{{ Form::close() }}
		<hr>
	@endforeach
@stop