<!DOCTYPE html>
<html>
<head>
	<title>SFMS-Login</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="container">
		<nav>
			<div class="links">
				<ul>
					<li><a href="index.php">SFMS</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>

			<div class="log-reg-btns">
					<!-- <form action="db.php" method="post">
						<a href='#' style = 'padding: 0px; margin: 0px; text-decoration: underline;'>user1</a> is logged in.
						<input type="submit" name="logout" value="LOGOUT">
					</form> -->
						<ul>
							<li><a href="login.php">Log In</a></li>
							<li><a href="register.php" class="call-to-action">Sign Up</a></li>
						</ul>
			</div>
        </nav>
		<section class="content">
		
			<div class="modal" id="login-modal">
		<h1>LOGIN</h1>
		<form action="home.php" method="post">
			<p><label>Username</label><br>
			<input type="text" name="user"></p>

			<p><label>Password</label><br>
			<input type="password" name="pass"></p>

			<p>Don't have an account? <a href="register.php">Register</a></p>

			<p><input type="submit" name="login" value="LOGIN"></p>
		</form>	
	</div>
	</section>
        <footer>
			<div class="links">
				<ul>
					<li>© 2019 SFMS</li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>
        </footer>
	</div>
</body>
</html>
