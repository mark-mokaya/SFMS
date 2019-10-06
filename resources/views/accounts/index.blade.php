@extends('layouts.main')
@section('content')
<h1>MY ACCOUNTS</h1>
    @if(count($Accounts)>0)
        @foreach ($Accounts as $Account)
        <article class="account">
            <h1><?php echo strtoupper($Account->acc_name);?></h1>
            <p>Kshs. {{$Account->amount}} &nbsp; <a href="addExpense" class="call-to-action"><b>+</b></a>
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
