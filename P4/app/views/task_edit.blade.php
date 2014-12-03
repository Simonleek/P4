@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $task['name'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/task/edit')) }}

		{{ Form::hidden('id',$task['id']); }}
		{{ Form::hidden('user_id', Auth::user()->id) }}
		<div class='form-group'>
			{{ Form::label('name','Name') }}
			{{ Form::text('name',$task['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('completed', 'Completed') }}
			{{ Form::select('completed', array('true', 'false') , $task->completed); }}
		</div>

		<div class='form-group'>
			{{ Form::label('taskType_id', 'TaskType') }}
			{{ Form::select('taskType_id', $taskTypes, $task->taskType_id); }}
		</div>
		<div class='form-group'>
			{{ Form::label('detail','Detail') }}
			{{ Form::textarea('detail',$task['detail']); }}
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/task/delete')) }}
			{{ Form::hidden('id',$task['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop