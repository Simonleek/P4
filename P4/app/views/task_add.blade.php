@extends('_master')

@section('title')
	Add a new task
@stop

@section('content')

	<h1>Add a new task</h1>

	{{ Form::open(array('url' => '/task/create')) }}


		{{ Form::label('name','Name') }}
		{{ Form::text('name'); }}

		{{ Form::hidden('user_id', Auth::user()->id) }}


		{{ Form::label('detail','Task Detail') }}
		{{ Form::textarea('detail'); }}

		{{ Form::label('completed','completed?') }}
		{{ Form::radio('completed', '0', true) }} true
    	{{ Form::radio('completed', '1') }} false

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop
