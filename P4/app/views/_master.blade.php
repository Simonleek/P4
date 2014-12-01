<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
	<title>@yield('title','Task Assignments')</title>
	<link rel='stylesheet' href='/css/P4CSS.css' type='text/css'>
	@yield('head')
	</head>
<body>
	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<nav>
		<ul>
		@if(Auth::check())
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
			<li><a href='/task/view/all'>View all Tasks</a></li>
			<li><a href='/task/view/completed'>View completed Tasks</a></li>
			<li><a href='/task/view/incomplete'>View incomplete Tasks</a></li>
			<li><a href='/task/create'>+ Add Task</a></li>
		@else
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>



	@yield('content')

	@yield('/body')
</body>
</html>