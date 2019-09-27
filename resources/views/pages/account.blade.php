@extends('layouts.main')
@section('content')
<h1>MY ACCOUNTS</h1>
    <article class="account">
        <h1>CASH</h1>
        <p>Kshs. 1600.00 &nbsp; <a href="addExpense" class="call-to-action"><b>+</b></a>
    </article>
    <article class="account">
        <h1>M-PESA</h1>
        <p>Kshs. 500.00 &nbsp; <a href="addExpense" class="call-to-action"><b>+</b></a>
    </article>
    <article class="account">
        <h1>SAVINGS</h1>
        <p>Kshs. 1600.00 &nbsp; <a href="addExpense" class="call-to-action"><b>+</b></a>
    </article>
    <article class="account add">
        <h1>Add Account</h1>
        <p><a href="addAccount" class="call-to-action"><b>+</b></a>
    </article>
@endsection
