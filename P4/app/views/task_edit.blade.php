@extends('_master')
{{---- This is the edit task page for Assignment 4;  --}}
@section('title')
	Edit
@stop
@section('head')
@stop
@section('content')
	<h1>Task Editing</h1>
	<h2>{{{ $task['name'] }}}</h2>
	{{ Form::open(array('url' => '/task/edit')) }}
		{{ Form::hidden('id',$task['id']); }}
		{{ Form::hidden('user_id', Auth::user()->id) }}
		<table>
			<tr>
			<td>{{ Form::label('name','Name') }}</td>
			<td>{{ Form::text('name',$task['name']); }} (5-50 characters)</td>
			</tr>
			<tr>
			<td>{{ Form::label('completed', 'Completed') }}</td> 
			{{-- create a drop down box for user to select completion status --}}
			<td>{{ Form::select('completed', array('true', 'false') , $task->completed); }}</td>
			</tr>
			<tr>
			<td>{{ Form::label('taskType_id', 'TaskType') }}</td>
			{{-- create a drop down box for user to select task type --}}
			<td>{{ Form::select('taskType_id', $taskTypes, $task->taskType_id); }}</td>
			<tr>
			<td>{{ Form::label('detail','Detail') }}</td>
			<td>{{ Form::textarea('detail',$task['detail'],['size' => '15x3']); }} (not required, max 200 char)</td>
			</tr>
			<tr>
			<td>{{ Form::submit('Save'); }}&nbsp;{{ HTML::link('/task/view/all', '(Cancel)') }}
			<td>		
				@foreach($errors->all() as $message)
				<div >* {{ $message }}</div>
				@endforeach
			</td>
			</tr>
		</table>
	{{ Form::close() }}
	{{ Form::open(array('url' => '/task/delete')) }} {{-- user can delete the task here. --}}
			{{ Form::hidden('id',$task['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
	{{ Form::close() }}
@stop