<!DOCTYPE html>
<html>
<head>
    <title>SFMS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div id="container">
<nav>
<div class="links">
    <ul>
        <li><a href="/">SFMS</a></li>
        <li><a href="about">About</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="support">Support</a></li>
    </ul>
</div>

<div class="log-reg-btns">
        <ul>
            <li><a href="login">Log In</a></li>
            <li><a href="register" class="call-to-action">Sign Up</a></li>
        </ul>
</div>
</nav>
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
