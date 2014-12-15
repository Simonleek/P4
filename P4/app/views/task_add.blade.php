@extends('_master')
{{---- This is the add task page for Assignment 4;  --}}
@section('title')
	Add a new task
@stop

@section('content')
	<h1>Add a New Task</h1>
	{{ Form::open(array('url' => '/task/create')) }}
		<table>
			<tr>
				<td>{{ Form::label('name','Name:') }}</td>
				<td>{{ Form::text('name'); }}(5-50 characters)</td>
			</tr>
			<tr>  {{--task type is foreign key to the task type table --}}
				<td>{{ Form::label('taskType_id', 'TaskType') }}</td>
				<td>{{ Form::select('taskType_id', $taskTypes); }}</td>
			</tr>
			<tr> {{-- task detail is not required --}}
				<td>{{ Form::label('detail','Task Detail') }}</td>
				<td>{{ Form::textarea('detail', null,['size' => '15x3']); }}(not required, max 200 char)</td>
			</tr>
			<tr>{{-- completed tasks will be non-editable --}}
				<td>{{ Form::label('completed','Completed?') }}</td>
				<td>{{ Form::radio('completed', '0', true) }} True
    				{{ Form::radio('completed', '1') }} False</td>
    		</tr>
		</table>
		{{---- User_id is tracked through a hidden field here, task is owned by the signin account  --}}
		{{ Form::hidden('user_id', Auth::user()->id) }}{{ Form::submit('Add'); }}
		{{ Form::close() }}
		{{-- to display all errors --}}
		@foreach($errors->all() as $message)
			<div >* {{ $message }}</div>
		@endforeach
@stop
