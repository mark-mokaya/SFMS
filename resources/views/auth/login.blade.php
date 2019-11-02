@extends('layouts.landing')

@section('content')
<div class="form_container" id="reg-Modal">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1>{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h1></div>
                <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
