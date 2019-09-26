<!DOCTYPE html>
<html>
<head>
	<title>SFMS-Add Receipt</title>
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
        <h1>ADD RECEIPT</h1>
		<section class="content">
			<div class="modal" id="reg-Modal">
				<form action="accounts.php" method="post">

                    <p><label>Category</label><br>
                    <input type="text" name="category"></p>

                    <p><label>Description</label><br>
                    <textarea name="description" cols="58" rows="10"></textarea>

					<p><label>Upload Receipt</label><br>
                    <!-- <input type="file" name="receipt"> -->
					<p><a href="add-receipt.php" class="call-to-action"><b>+</b></a>
                    <br><br>

					<p><input type="submit" name="add_receipt" value="ADD RECEIPT"></p>
					
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
