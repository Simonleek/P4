@extends('_master')

@section('title')
	Task_index
@stop

@section('content')

	<h1>Tasks</h1>
	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)
			<section class='task'>
				<h2>{{ $task['name'] }}</h2>
				<p>
				{{$task['detail']}}
				</p>
				@if ($task['completed'] == 0)
    			<p>Completed - completed at {{$task['updated_at']}}</p>
				@else
    			<p>Incomplete - created at {{$task['created_at']}}</p>
				@endif
				@foreach ($taskTypes as $type)
    				@if($task['taskType_id'] == $type['id'])
    					<p>Task Type - {{ $type['name'] }}</p>
    				@endif
				@endforeach
				@if ($task['completed'] == 1)
    			<a href='/task/edit/{{$task['id']}}'>Edit</a>
				@else
    				<div>
					{{---- DELETE -----}}
					{{ Form::open(array('url' => '/task/delete')) }}
					{{ Form::hidden('id',$task['id']); }}
					<button onClick='parentNode.submit();return false;'>Delete</button>
					{{ Form::close() }}
					</div>
				@endif
				
				<hr>
			</section>
		@endforeach

	@endif

@stop







