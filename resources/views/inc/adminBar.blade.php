<!DOCTYPE html>
<html>
<head>
	<title>SFMS</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond|Pacifico&display=swap" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Pacifico&display=swap" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	
   
	
</head>
<body><br>
		<div id="container">		
		<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
			<!-- Navbar Container -->
			<div class="container">
		
				<!-- Navbar Header [contains both toggle button and navbar brand] -->
				<div class="navbar-header" >
					<!-- Toggle Button [handles opening navbar components on mobile screens]-->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#exampleNavComponents" aria-expanded"false">
						<i class="glyphicon glyphicon-align-center"></i>
					</button>
					<h3>SFMS</h3>							
				</div>
				<div class="collapse navbar-collapse" id="exampleNavComponents">
					<ul class="nav navbar-nav">
				
					<li ><a  href="/users">Graph</a></li>
					<li ><a href="/devices">UserChart</a></li>
					
					@guest
								
					<ul class="navbar-nav ml-auto"style="list-style-type:none;">
						<!-- Authentication Links -->
						<li class="nav-item dropdown">
								{{ Auth::guard('admin')->user()->first_name }}  
							
							</a>

							{{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
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
	</nav>
	<br><br>
	<main class="py-4">
@include('inc.messages') 
@yield('content')
			</main> 
{{-- <footer>
	<div class="links">
		<ul>
			<li>© 2019 SFMS</li>
			<li><a href="/about">About</a></li>
			<li><a href="/contact">Contact</a></li>
			<li><a href="/support">Support</a></li>
		</ul>
	</div>
</footer> --}}
</div>
</div>
</body>
</html>