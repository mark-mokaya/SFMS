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
        <h1>MY ACCOUNTS</h1>
		<section class="content">
			<article class="account">
                <h1>CASH</h1>
                <p>Kshs. 1600.00 &nbsp; <a href="add-expense.php" class="call-to-action"><b>+</b></a>
            </article>
            <article class="account">
                <h1>M-PESA</h1>
                <p>Kshs. 500.00 &nbsp; <a href="add-expense.php" class="call-to-action"><b>+</b></a>
            </article>
            <article class="account">
                <h1>SAVINGS</h1>
                <p>Kshs. 1600.00 &nbsp; <a href="add-expense.php" class="call-to-action"><b>+</b></a>
            </article>
            <article class="account add">
                <h1>Add Account</h1>
               <p><a href="add-account.php" class="call-to-action"><b>+</b></a>
			</article>
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
