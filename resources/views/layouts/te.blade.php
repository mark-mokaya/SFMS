<!DOCTYPE html>
<html>
<head>
    <title>SFMS-My Accounts</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    
</head>
<body>
	<div id="container">		
		{{-- <nav>
			<div class="links"> --}}
					<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
							<!-- Navbar Container -->
							<div class="container">
						
								<!-- Navbar Header [contains both toggle button and navbar brand] -->
								<div class="navbar-header">
									<!-- Toggle Button [handles opening navbar components on mobile screens]-->
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#exampleNavComponents" aria-expanded"false">
										<i class="glyphicon glyphicon-align-center"></i>
									</button>
						
									<!-- Navbar Brand -->
									{{-- <a href="#" class="navbar-brand"> --}}
									<h3>STUDENT SAVER
										</h3>
										
									</a>
								</div>
						
						
								<!-- Navbar Collapse [contains navbar components such as navbar menu and forms ] -->
								<div class="collapse navbar-collapse" id="exampleNavComponents">
					<ul class="nav navbar-nav">
				
                	<li ><a  href="/home">SFMS</a></li>
					<li ><a href="/accounts">Accounts</a></li>
					<li ><a href="/budgets">Budgets</a></li>
					<li ><a href="/expenses">Expenses</a></li>
					<li ><a href="/categories">Categories</a></li>				   
			
			
			@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
			@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
			@endif
			@else
			<div class="logs">
			<li class="nav-item dropdown">                                 
			<a id="navbarDropdown" class="nav-link dropdown-toggle navbar-right " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>

				</div>
			</li>
			</div>
		@endguest
	</ul>
</div>
</div>
</div>
<br><br>
<main class="py-4">
		@include('inc.messages')
		@yield('content')
	</main>
</div>		
		<footer>
				<div class="links">
					<ul>
						<li>© 2019 SFMS</li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
						<li><a href="/support">Support</a></li>
					</ul>
				</div>
			</footer>
			</body>
</html>