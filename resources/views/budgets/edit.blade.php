@extends('layouts.main')
@section('content')
    <h1>EDIT BUDGET</h1>
        <div class="modal" id="reg-Modal">
            {!! Form::open(['action' => ['BudgetsController@update', $budget->id], 'method' => 'POST']) !!}
                <p>{{Form::label('budget_name','Budget Name')}}<br>
                {{Form::text('budget_name', $budget->budget_name)}}</p>
                
                <p>{{Form::label('amount','Amount')}}<br>
                {{Form::number('amount', $budget->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', $budget->description, ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>

                {{Form::hidden('_method', 'PUT')}}

                <p>{{Form::submit('EDIT BUDGET')}}</p>

            {!! Form::close() !!}
        </div>
@endsection