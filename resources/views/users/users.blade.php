@extends('layouts.admin')
@section('content')
{{-- {{$pulses}} --}}
<div class="container">
    <h1>Graph indicating number of users of the app</h1>
    <div class="row">
        <div class="col-6">
            <div class="card rounded">
                <div class="card-body py-3 px-3">
                    {!! $usersChart->container() !!}
           
                </div>
            </div>
        </div>
        <a href="devices">VIEW DETAILS3</a>
    </div>
{{--    
