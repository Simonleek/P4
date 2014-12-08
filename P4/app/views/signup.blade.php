@extends('_master')

@section('title')
	CSCE15 Task Manager Sign Up
@stop
@section('head')

@stop
@section('content')
<h2>New User Sign Up</h2>
<hr>
{{ Form::open(array('url' => '/signup')) }}
<table>
	<tr>
		<td>{{ Form::label('email') }}</td>
    	<td>{{ Form::text('email') }}</td>
	</tr>
	<tr>
    	<td>{{ Form::label('password') }}</td>
    	<td>{{ Form::password('password') }}
    	<small>Minimum 6 characters required.</small></td>
	</tr>
	<tr>
    	<td >{{ Form::submit('Submit') }}
    	</td><td>@foreach($errors->all() as $message)
			<div >* {{ $message }}</div>
		@endforeach
    	</td>
    </tr>
</table>
{{ Form::close() }}
@stop




