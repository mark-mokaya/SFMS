@extends('layouts.main')
@section('content')
<h1>MY ACCOUNTS</h1>
    @if(count($Accounts)<1)
        <p>No Accounts Created. Create Your First Account Down Below.</p>

        <article class="account add">
            <h1>Add Account</h1>
            <p><a href="/accounts/create" class="call-to-action"><b>+</b></a>
        </article>
    @else
        <article class="account add">
            <h1>Add Account</h1>
            <p><a href="/accounts/create" class="call-to-action"><b>+</b></a>
        </article>

        @foreach ($Accounts as $Account)
        <article class="account">
            <h1>{{strtoupper($Account->acc_name)}}</h1>
            <p>My {{ucFirst($Account->acc_name)}} Account<br><b>Kshs. {{number_format($Account->amount,2,".",",")}}</b>
            <br><br>
            <p><a href="/accounts/{{$Account->id}}" class="call-to-action"><b>VIEW</b></a> &nbsp; <a href="/accounts/{{$Account->id}}" class="call-to-action"><b>EDIT</b></a>
        </article>
        @endforeach
    @endif
@endsection
 