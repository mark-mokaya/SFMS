@extends('layouts.main')
@section('content')
    <h1>ADD BUDGET</h1>
        <div class="modal" id="reg-Modal">
            {!! Form::open(['action' => 'BudgetsController@store', 'method' => 'POST']) !!}
                <p>{{Form::label('budget_name','Budget Name')}}<br>
                {{Form::text('budget_name', '')}}</p>
                
                <p>{{Form::label('amount','Amount')}}<br>
                {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', 'My budget for...', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none'])}}</p>

                <p>{{Form::submit('ADD BUDGET')}}</p>

            {!! Form::close() !!}
        </div>
@endsection

