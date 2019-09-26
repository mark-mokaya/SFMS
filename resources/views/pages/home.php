<!DOCTYPE html>
<html>
<head>
	<title>SFMS-My Accounts</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="container">
		<nav>
			<div class="links">
				<ul>
                <li><a href="home.php">SFMS</a></li>
					<li><a href="accounts.php">Accounts</a></li>
					<li><a href="add-expense.php">Expenses</a></li>
				</ul>
			</div>

			<div class="log-reg-btns">
					<form action="index.php" method="post">
						<a href='#' style = 'padding: 0px; margin: 0px; text-decoration: underline;'>user1</a> is logged in.
						<input type="submit" name="logout" value="LOGOUT">
					</form>
			</div>
        </nav>
        <h1>ACCOUNT SUMMARY</h1>
		<section class="content">
			<article>
				<h1>THIS IS THE SUMMARY OF ALL YOUR FINANCES</h1>
				<a href="#" class="call-to-action">SEE DETAILS</a>
            </article>
		</section>

		<section class="content">
			<h1>MY BUDGETS</h1>

			<article class="account">
                <h1>MY FIRST BUDGET</h1>
                <p>Kshs. 1000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>

			<article class="account">
                <h1>FOOD</h1>
                <p>Kshs. 4500.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>

			<article class="account">
                <h1>ENTERTAINMENT</h1>
                <p>Kshs. 3000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>

			<h1>MY EXPENSES</h1>

			<article class="account">
                <h1>TODAY</h1>
                <p>Kshs. 1000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>

			<article class="account">
                <h1>THIS WEEK</h1>
                <p>Kshs. 3000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>

			<article class="account">
                <h1>THIS MONTH</h1>
                <p>Kshs. 4500.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
            </article>
        </section>

		<br><br><br>


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
