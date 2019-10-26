<!DOCTYPE html>
<html>
<head>
	<title>SFMS-My Accounts</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
	<div id="container">		
		<nav>
			<div class="links">
				<ul>
                	<li><a href="/home">SFMS</a></li>
					<li><a href="/accounts">Accounts</a></li>
					<li><a href="/budgets">Budgets</a></li>
					<li><a href="/expenses">Expenses</a></li>
					<li><a href="/categories">Categories</a></li>
				</ul>
			</div>

			<div class="log-reg-btns">
				<form action="/" method="get">
					<a href='/' style = 'padding: 0px; margin: 0px; text-decoration: underline;'>User1</a> is logged in.
					<input type="submit" name="logout" value="LOGOUT">
				</form>
			</div>
		</nav>

		@include('inc.messages')
		
        @yield('content')
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
	</div>
</body>
</html>