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
				@if ($task['completed'] == 0)
    			<p>Completed</p>
				@else
    			<p>Incomplete</p>
				@endif
				<br/>
				{{$task['detail']}}<br/>
				{{$task['created_at']}}<br/>
				{{$task['updated_at']}}<br/>
				<a href='/task/edit/{{$task['id']}}'>Edit</a>
				<hr>
			</section>
		@endforeach

	@endif

@stop







