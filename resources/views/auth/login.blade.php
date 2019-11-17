@extends('layouts.landing')
@section('content')		
@section('content')
<div class="form_container" id="reg-Modal">
        <div class="col-md-8"> 
             <div class="card">
                        <h1>  <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('LOGIN') }}</div></h1>
                        {{-- <div class="card-body"> --}}
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

		<p><input type="submit" name=" {{ __('Login') }}" value="LOGIN"></p>
                               
    </div>
</div>
</div>
@endsection
