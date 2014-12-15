@extends('_master')
{{---- This is the task type editing page for Assignment 4;  --}}
@section('title')
	Edit Task Type
@stop
@section('content')
	{{ Form::model($tasktype, ['method' => 'put', 'action' => ['TaskTypeController@update', $tasktype->id]]) }}
		<h1>Update Task Type: {{ $tasktype->name }}</h1><br/>
			{{---- The only editable element of task type is the name -----}}
			{{ Form::label('name', 'Task Type: ') }}
			{{ Form::text('name') }} 
			{{ Form::hidden('id',$tasktype['id']); }}
		{{ Form::submit('Update') }}
	{{ Form::close() }}
	{{---- This is the delete button of task type -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TaskTypeController@destroy', $tasktype->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>(Delete)</a> &nbsp;{{ HTML::link('/tasktype', '(Cancel)') }}
	{{ Form::close() }}
		@foreach($errors->all() as $message)
			<div >* {{ $message }}</div>
		@endforeach
@stop