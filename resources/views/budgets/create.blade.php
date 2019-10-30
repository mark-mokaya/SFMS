@extends('layouts.main')
@section('content')
    <h1>ADD BUDGET</h1>
        <div class="form_container" id="reg-Modal">
            {!! Form::open(['action' => 'BudgetsController@store', 'method' => 'POST']) !!}

                <p>{{Form::label('budget_name','Budget Name')}}<br>
                {{Form::text('budget_name', '')}}</p>
                
                <p>{{Form::label('amount','Amount')}}<br>
                {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('budget_period','Budget Period')}}<br>
                {{Form::select('budget_period', ['+1 week' => 'One Week', '+2 weeks' => 'Two Week', '+1 month' => 'One Month', '+6 months' => 'Six Months', '+1 year' => 'One Year'], '+1 month', ['style' => 'text-align-last:center; margin: 0px auto;'])}}</p>

                <p>{{Form::label('categories','Categories')}}<br>
                    <div style="background-color: #ddd; max-width: 400px; border-radius: 5px; padding: 10px; margin: -15px 10px 0px 60px; display: inline-block;">
                        @foreach ($Categories as $Category)
                            <span style="display: inline-block;">{{$Category->category_name}}{{Form::checkbox('categories[]',$Category->id)}}</span>
                        @endforeach
                    </div> &nbsp; <a href="/categories/create" class="call-to-action"><b>+</b></a>
                </p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', 'My budget for ', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>
                
                <p>{{Form::submit('ADD BUDGET')}}</p>

            {!! Form::close() !!}
        </div>
@endsection

