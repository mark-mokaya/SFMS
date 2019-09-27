<!DOCTYPE html>
<html>
<head>
	<title>SFMS-My Accounts</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<div id="container">		
		<nav>
			<div class="links">
				<ul>
                	<li><a href="/home">SFMS</a></li>
					<li><a href="/account">Accounts</a></li>
					<li><a href="/budget">Budgets</a></li>
					<li><a href="/addExpense">Expenses</a></li>
				</ul>
			</div>

			<div class="log-reg-btns">
				<form action="/" method="get">
					<a href='/' style = 'padding: 0px; margin: 0px; text-decoration: underline;'>{{$name}}</a> is logged in.
					<input type="submit" name="logout" value="LOGOUT">
				</form>
			</div>
        </nav>
        @yield('content')
		<br><br><br>
		
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
	<script>
	let summaryChart= document.getElementById('summaryChart').getContext('2d');
	//Global options
		Chart.defaults.global.defaultFontSize = 16;
	let Spendings = new Chart(summaryChart,{
		type:'doughnut',//dft types of charts
		data:{ 
		labels:['Food','Shopping','Travel','Entertainment'],
		datasets:[{
			label:'Monthly Spending',
			data:[80,20,50,40],
			backgroundColor:['#FE4A49','#2AB7CA','#FED766','#E6E6EA'],
			borderWidth:2,
			borderColor:'#fff',
			hoverBorderWidth:0,
			hoverBorderColor:'#fff'
		}]},
		options:{
			title:{
				display:false
			},
			legend:{
				display:true,
				position: 'right',				
			},
			tooltips:{
				enable:false
			}
		}});
	</script>
</body>
</html>