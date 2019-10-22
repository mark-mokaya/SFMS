@extends('layouts.main')
@section('content')
	<h1>MY BUDGETS</h1>
	@if(count($Budgets)<1)
        <p>No Budgets Created. Create Your First Budget Down Below.</p>

        <article class="budget add">
            <h1>Add Budget</h1>
            <p><a href="/budgets/create" class="call-to-action"><b>+</b></a>
        </article>
    @else
        <article class="budget add">
            <h1>Add Budget</h1>
            <p><a href="/budgets/create" class="call-to-action"><b>+</b></a>
        </article>

        @foreach ($Budgets as $Budget)
        <article class="budget">
            <h1>{{strtoupper($Budget->budget_name)}}</h1>
        <p>Kshs. {{number_format($Budget->amount,2,".",",")}} &nbsp; <a href="/budgets/{{$Budget->id}}" class="call-to-action"><b>+</b></a>
        </article>
        @endforeach
    @endif
@endsection
