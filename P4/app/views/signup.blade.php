@extends('_master')
{{---- This is the sign up page for Assignment 4; User is identified by Email address and a password. --}}
@section('title')
	CSCE15 Task Manager Sign Up
@stop
@section('head')

@stop
@section('content')
<h1>New User Sign Up</h1>
<hr>
{{ Form::open(array('url' => '/signup')) }}
<table>
	<tr>
		<td>{{ Form::label('email') }}</td>
    	<td>{{ Form::text('email') }} (5-50 characters)</td>
    	{{-- These requirement will be validated in the controller --}}
	</tr>
	<tr>
    	<td>{{ Form::label('password') }}</td>
    	<td>{{ Form::password('password') }} (6-50 characters, required.)</td>
	</tr>
	<tr>
    	<td >{{ Form::submit('Submit') }}
    	</td><td>  {{-- To display each error message --}}
    	@foreach($errors->all() as $message)
			<div >* {{ $message }}</div>
		@endforeach
    	</td>
    </tr>
</table>
{{ Form::close() }}
@stop




