@extends('layouts.main')
@section('content')
    <h1>EDIT BUDGET</h1>
        <div class="modal" id="reg-Modal">
            {!! Form::open(['action' => ['BudgetsController@update', $budget->id], 'method' => 'POST']) !!}

                {{Form::hidden('user_id', Auth::user()->id)}}

                <p>{{Form::label('budget_name','Budget Name')}}<br>
                {{Form::text('budget_name', $budget->budget_name)}}</p>
                
                <p>{{Form::label('amount','Amount')}}<br>
                {{Form::number('amount', $budget->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('categories','Categories')}}<br>
                    <div style="background-color: #ddd; width: 400px; border-radius: 5px; padding: 10px; margin: -15px auto 0px auto;">
                        @foreach ($Categories as $Category)
                        {{$Category->category_name}} {{Form::checkbox('categories[]',$Category->id)}}
                        @endforeach
                    </div>              
                </p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', $budget->description, ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>

                {{Form::hidden('_method', 'PUT')}}

                <p>{{Form::submit('EDIT BUDGET')}}</p>

            {!! Form::close() !!}
        </div>
@endsection