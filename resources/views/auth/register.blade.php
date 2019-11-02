@extends('layouts.landing')

@section('content')
<div class="form_container" id="reg-Modal">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
             <div class="card">
                <div class="card-header"> <h1>{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</h1></div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                    @else
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset
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
                            
                        {{-- <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                           <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('Firstname') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                 @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="Last Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="User Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               <p> <input type="submit" class="btn btn-primary" name=" {{ __('Register') }}"></p>
                                    {{ __('Register') }} 
                                </button>
                            </div>
                        </div>--}}
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
