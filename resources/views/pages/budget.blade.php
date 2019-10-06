@extends('layouts.main')
@section('content')
	<h1>MY BUDGETS</h1>
	<article class="budget">
		<h1>MY FIRST BUDGET</h1>
		<p>Kshs. 1000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
	</article>

	<article class="budget">
		<h1>FOOD</h1>
		<p>Kshs. 4500.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
	</article>

	<article class="budget">
		<h1>ENTERTAINMENT</h1>
		<p>Kshs. 3000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
	</article>

	<article class="budget add">
        <h1>Add Budget</h1>
        <p><a href="addBudget" class="call-to-action"><b>+</b></a>
    </article>
@endsection
