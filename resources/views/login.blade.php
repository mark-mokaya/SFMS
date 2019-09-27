@extends('layouts.landing')
@section('content')		
	<div class="modal" id="login-modal">
	<h1>LOGIN</h1>
	<form action="/home" method="get">
		<p><label>Username</label><br>
		<input type="text" name="user"></p>

		<p><label>Password</label><br>
		<input type="password" name="pass"></p>

		<p>Don't have an account? <a href="/register">Register</a></p>

		<p><input type="submit" name="login" value="LOGIN"></p>
	</form>	
	</div>
@endsection
