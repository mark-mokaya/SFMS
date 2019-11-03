@extends('layouts.landing')
@section('content')		
	<div class="form_container" id="login-modal">
	<h1>LOGIN</h1>
	@isset($url)
		<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
	@else
		<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
	@endisset
		
		@csrf
		
		<p><label>Username</label><br>
		<input type="text" name="username"></p>

		<p><label>Password</label><br>
		<input type="password" name="password"></p>

		<p>Don't have an account? <a href="/register">Register</a></p>

		<p><input type="submit" name="login" value="LOGIN"></p>
	</form>	
	</div>
@endsection 

