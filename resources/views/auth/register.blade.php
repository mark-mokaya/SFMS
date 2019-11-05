@extends('layouts.landing')

@section('content')
<div class="form_container" id="reg-Modal">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <h3> <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div></h3>

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
                  
                                <input type="submit"  name=" {{ __('Register') }}" >
                                   
                            
                       

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
