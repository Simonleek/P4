@extends('_master')

{{------- This is the index page of Assignment 4.  It display a few business rules of this application ------}}

@section('title')
	Welcome to Task Manager
@stop

@section('head')

@stop

@section('topic')
<H1>Welcome to Task Manager</H1>
@stop
@section('content')
	<br/>
	<hr>
	<h2>How to use this task manager</h2>
	<h4>
		<p>You must sign in or create an account to use this task manage. </p>
		<p>A user can create multiple tasks; They can only view, update or delete the task that they have created.  </p>
		<p>Each task belongs to a task type.  Task types can be created or updated and it is a shared resource.  A user can update or delete a task type if it is not in use by any task. </p>
		<p>Each task has a completed or incomplete status.  A completed task is not editable.  Owner of a task can delete the task regardless of its completion status. </p> 
		<p>The system will track creation timestamp and last updated timestamp of a task.  The last update that marked a task as completed is considered to be its completion timestamp. </p>
		<p> Please click Sign Up or Log in above to continue...</p>
		</h4>
	<br />
	<hr>
@stop
