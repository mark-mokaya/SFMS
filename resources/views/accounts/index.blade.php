@extends('layouts.main')
@section('content')
<h1>MY ACCOUNTS</h1>
    @if(count($Accounts)>0)
        @foreach ($Accounts as $Account)
        <article class="account">
            <h1>{{strtoupper($Account->acc_name)}}</h1>
            <p>Kshs. {{number_format($Account->amount,2,".","")}} &nbsp; <a href="/accounts/{{$Account->id}}" class="call-to-action"><b>+</b></a>
        </article>
        @endforeach
    @else
        <p>No Accounts Created. Create Your First Account Down Below.</p>
    @endif

    <article class="account add">
        <h1>Add Account</h1>
        <p><a href="addAccount" class="call-to-action"><b>+</b></a>
    </article>
@endsection
