<!DOCTYPE html>
<html>
<head>
	<title>SFMS-Add Account</title>
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
        <h1>ADD ACCOUNT</h1>
		<section class="content">
			<div class="modal" id="reg-Modal">
				<form action="accounts.php" method="post">
					<p><label>Account Name</label><br>
					<input type="text" name="acc_name"></p>

					<p><label>Account Type</label><br>
					<input type="text" name="acc_type"></p>

					<p><label>Amount</label><br>
					<input type="text" name="amount"></p>
					
					<p><label>Description</label><br>
                    <textarea name="description" cols="58" rows="8"></textarea>
                    
					<p><input type="submit" name="add_account" value="ADD ACCOUNT"></p>
					
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
