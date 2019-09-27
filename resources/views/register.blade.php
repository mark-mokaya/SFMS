@extends('layouts.landing')
@section('content')		
	<div class="modal" id="reg-Modal">
		<h1>REGISTER</h1>
		<form action="/home" method="get">
			<p><label>First Name</label><br>
			<input type="text" name="fname"></p>

			<p><label>Last Name</label><br>
			<input type="text" name="lname"></p>

			<p><label>Username</label><br>
			<input type="text" name="user"></p>

			<p><label>Email</label><br>
			<input type="email" name="email"></p>

			<p><label>Password</label><br>
			<input type="password" name="pass"></p>

			<p>Already have an account? <a href="/login">Login</a></p>
			
			<p><input type="submit" name="register" value="REGISTER"></p>
			
		</form>
	</div>
@endsection
