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
            {!!Form::open(['action' => ['BudgetsController@destroy', $Budget->id, 'method'=>'POST']])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('X')}}
            {!!Form::close()!!}
            <h1>{{strtoupper($Budget->budget_name)}}</h1>
            <p>My Budget for {{ucFirst($Budget->budget_name)}}<br><b>Kshs. {{number_format($Budget->amount,2,".",",")}}</b>
                <br><br>
            <p><a href="/budgets/{{$Budget->id}}" class="call-to-action"><b>VIEW</b></a> &nbsp; 
                <a href="/budgets/{{$Budget->id}}/edit" class="call-to-action"><b>EDIT</b></a>
        </article>
        @endforeach
    @endif
@endsection
