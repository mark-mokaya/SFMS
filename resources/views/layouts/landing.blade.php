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
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	
</head>
<body>
<div id="container">
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
{{-- <div class="links">
    <ul>
        <li><a href="/">SFMS</a></li>
        <li><a href="about">About</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="support">Support</a></li>
    </ul>
</div> --}}
<div class="container">
<div class="navbar-header" >
    <!-- Toggle Button [handles opening navbar components on mobile screens]-->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#exampleNavComponents" aria-expanded"false">
        <i class="glyphicon glyphicon-align-center"></i>
    </button>
    <h3>SFMS</h3>							
</div>
<div class="collapse navbar-collapse" id="exampleNavComponents">
    <div class="links">
    <ul class="nav navbar-nav">

        <li><a href="/">SFMS</a></li>
        <li><a href="about">About</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="support">Support</a></li>				   

{{-- <div class="log-reg-btns">  --}}
    
        @guest
            {{-- <ul> --}}
                <li><a href="{{ route('login') }}">Log In</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="call-to-action">Sign Up</a></li>
                @endif
            {{-- </ul> --}}
        @else 
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="/home" style = 'padding: 0px; margin: 0px; text-decoration: underline;'>{{ Auth::user()->first_name }}</a> is logged in.</a>
                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </form>
        @endguest
    
</div>
</nav>
<br><br><br><br>
        @include('inc.messages')
        @yield('content')
<footer>
    <div class="links">
        <ul>
            <li>© 2019 SFMS</li>
            <li><a href="about">About</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="#">Support</a></li>
        </ul>
    </div>
</footer>
</div>
</body>
</html>
