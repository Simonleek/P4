@extends('_master')

@section('title')
	Welcome to Task Manager
@stop

@section('head')

@stop

@section('content')
Some Content

	{{ Form::open(array('url' => '/task', 'method' => 'GET')) }}



	{{ Form::close() }}
@stop
