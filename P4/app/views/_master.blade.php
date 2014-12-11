<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
	<title>@yield('title','CSCE15 Task Manager')</title>
	<link rel='stylesheet' href='/css/P4CSS.css' type='text/css'>
	@yield('head')
	</head>
	<body>
	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif
	<h1 class="title">CSCE15 Task Manager</h1>
	<nav>
		<ul>
		@if(Auth::check())
			<li><a href='/task/view/all'>View all Tasks</a></li>
			<li><a href='/task/view/completed'>View completed Tasks</a></li>
			<li><a href='/task/view/incomplete'>View incomplete Tasks</a></li>
			<li><a href='/task/create'>+ Add Task</a></li>
			<li><a href='/tasktype'>+ Task Types</a></li>
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
		@else
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>
<body>
	<!--<form name="mainForm" id="mainForm" method="post" >-->
		<div id="Header">@yield('topic')</div>
		<div id="Container"> 
			<div id="Container2">
				<div id="columnSpace">&nbsp;</div>
				<div id="main">
					@yield('content')
					@yield('/body')
				</div>
			</div>
			<div id="columnSpace">&nbsp;</div>
			<div id="Footer"> <a href="http://p1.simonleetoronto.me">Copyright &copy; www.SimonLeeToronto.me 2014</a></div>
		</div>
	</div>	
	<!--</form>-->
</body>
</html>