@extends('_master')

@section('title')
	CSCE15 Task Manager Login Page
@stop
@section('head')

@stop
@section('content')
<h2>User Login</h2>
<hr>
{{ Form::open(array('url' => '/login')) }}
<table>
	<tr>
		<td>{{ Form::label('email') }}</td>
    	<td>{{ Form::text('email') }}</td>
	</tr>
	<tr>
    	<td>{{ Form::label('password') }}</td>
    	<td>{{ Form::password('password') }}</td>
	</tr>
	<tr>
    	<td >{{ Form::submit('Submit') }}</td>
    </tr>
</table>
{{ Form::close() }}
@stop
