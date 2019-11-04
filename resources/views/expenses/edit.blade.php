@extends('layouts.main')
@section('content')
    <h1>EDIT EXPENSE</h1>
	<div class="form_container" id="reg-modal">        
        {!! Form::open(['action' => ['ExpensesController@update', $Expense->id], 'method' => 'POST']) !!}

            <p>{{Form::label('category','Category')}}<br>
                <?php 
                    $list=[];
                    foreach ($Categories as $Category) {
                        $list[$Category->id] = $Category->category_name;
                    }
                ?>
            {{Form::select('category', $list, $Expense->category_id, ['style' => 'text-align-last:center;'])}} <a href="/categories/create" class="call-to-action"><b>+</b></a></p>

            <p>{{Form::label('account_name','Account Name')}}<br>
                <?php 
                    $list=[];
                    foreach ($Accounts as $Account) {
                        $list[$Account->id] = $Account->acc_name;
                    }
                ?>
            {{Form::select('account_name', $list, $Expense->acc_id, ['style' => 'text-align-last:center;'])}} <a href="/accounts/create" class="call-to-action"><b>+</b></a></p>
            
            <p>{{Form::label('amount','Amount')}}<br>
            {{Form::number('amount', $Expense->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>

            <p>{{Form::label('date_created','Date Created')}}<br>
                {{Form::date('date_created', $Expense->date_created, ['style' => 'text-indent: 25px;'])}}</p>

            {{Form::hidden('_method', 'PUT')}}
                
            <p> <input type="submit" name="action" value="EDIT EXPENSE">
        {!! Form::close() !!}
	</div>
@endsection
