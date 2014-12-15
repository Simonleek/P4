@extends('_master')
{{---- This is the task list page for Assignment 4  --}}
@section('title')
	CSCE15 Task Manager 
@stop
@section('head')
@stop
@section('content')
<h1>Task List for User {{ Auth::user()->email; }}</h2>
<hr>
@if(sizeof($tasks) == 0)
		No results {{---- If this is no task for this user, display no results.  --}}
	@else
		@foreach($tasks as $task)  {{---- loop through each task in the tasks collection --}}
				@if ($task['completed'] == 1)
				<div class='incomplete'>
    				<h4>{{ $task['name'] }}</h4>
				@else
				<div class='completed'>
					<p>{{ $task['name'] }}</p>
				@endif
				  
				{{---- Somehow, I can't get eager loading to work. So I just loop through the type array --}}
				Task Type: (
					@foreach ($taskTypes as $type)
    					@if($task['taskType_id'] == $type['id'])
    						{{ $type['name'] }}
    					@endif
					@endforeach
				)<br />
				Task Detail: {{$task['detail']}}
				<br /> 
				{{---- The creation time is always displayed.  If the task is completed, the last updated time is the completion time  --}}
				This task is created at: {{$task['created_at']}}<br />
				@if ($task['completed'] == 0)
    				This Task is Completed - completed at {{$task['updated_at']}}
				@else
    				This Task is Incomplete - last updated at {{$task['updated_at']}}
				@endif
				<br />
				{{---- Completed task is not updatable. User can only change in completed task  --}}
				@if ($task['completed'] == 1)
    				<a href='/task/edit/{{$task['id']}}'>Edit</a>
				@else
					{{ Form::open(array('url' => '/task/delete')) }}
					{{ Form::hidden('id',$task['id']); }}
					<button onClick='parentNode.submit();return false;'>Delete</button>
					{{ Form::close() }}
				
				@endif
				<hr>
				</div>
		@endforeach

	@endif

@stop






