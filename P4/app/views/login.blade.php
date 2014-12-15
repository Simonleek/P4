@extends('_master')

{{---- This is the log in page for Assignment 4; User is identified by Email address and a password. --}}
@section('title')
	CSCE15 Task Manager Login Page
@stop
@section('head')

@stop
@section('content')
<h1>User Login</h1>
<hr>
{{ Form::open(array('url' => '/login')) }}
<table>
	<tr>
		<td>{{ Form::label('email') }}</td>
    	<td>{{ Form::text('email') }} </td>
	</tr>
	<tr>
    	<td>{{ Form::label('password') }}</td>
    	<td>{{ Form::password('password') }} </td>   
    	{{---- password is not shown on the web page and it is hashed in the database ----}}
	</tr>
	<tr>
    	<td >{{ Form::submit('Submit') }}</td>
    </tr>
</table>
{{ Form::close() }}
@stop
