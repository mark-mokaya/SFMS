@extends('layouts.landing')
@section('content')		
	<div class="form_container" id="reg-Modal">
		<h1>REGISTER</h1>
		
		<form action="{{route('register')}}" method="post">
			@csrf
			
			<p><label>First Name</label><br>
			<input type="text" name="first_name"></p>

			<p><label>Last Name</label><br>
			<input type="text" name="last_name"></p>

			<p><label>Username</label><br>
			<input type="text" name="username"></p>

			<p><label>Email</label><br>
			<input type="email" name="email"></p>

			<p><label>Password</label><br>
			<input type="password" name="password"></p>

			<p>Already have an account? <a href="/login">Login</a></p>
			
			<p><input type="submit" name="register" value="REGISTER"></p>
			
		</form>
	</div>
@endsection
