@extends('layouts.main')
@section('content')
    <h1>ADD EXPENSE</h1>
	<div class="modal" id="reg-modal">        
        {!! Form::open(['action' => 'ExpensesController@store', 'method' => 'POST']) !!}
            <p>{{Form::label('category','Category')}}<br>
            {{Form::text('category', '')}}</p>

            <p>{{Form::label('account_name','Account Name')}}<br>
            {{Form::select('Account Name', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => ''])}}</p>
            
            <p>{{Form::label('amount','Amount')}}<br>
            {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>

            <p>{{Form::label('add_receipt','Add Receipt')}}</p>
            <p><a href="#" class="call-to-action"><b>+</b></a></p>
            <br>
            <p>{{Form::submit('ADD EXPENSE')}}</p>
        {!! Form::close() !!}
	</div>
@endsection
