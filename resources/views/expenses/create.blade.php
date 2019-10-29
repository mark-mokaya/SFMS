@extends('layouts.main')
@section('content')
    <h1>ADD EXPENSE</h1>
	<div class="modal" id="reg-modal">        
        {!! Form::open(['action' => 'ExpensesController@store', 'method' => 'POST']) !!}
            <p>{{Form::label('category','Category')}}<br>
                <?php 
                    $list=[];
                    foreach ($Categories as $Category) {
                        $list[$Category->id] = $Category->category_name;
                    }
                ?>
            {{Form::select('category', $list, null, ['placeholder' => '', 'style' => 'text-align-last:center;'])}} <a href="/categories/create" class="call-to-action"><b>+</b></a></p>

            <p>{{Form::label('account_name','Account Name')}}<br>
                <?php 
                    $list=[];
                    foreach ($Accounts as $Account) {
                        $list[$Account->id] = $Account->acc_name;
                    }
                ?>
            {{Form::select('account_name', $list, null, ['placeholder' => '', 'style' => 'text-align-last:center;'])}} <a href="/accounts/create" class="call-to-action"><b>+</b></a></p>
            
            <p>{{Form::label('amount','Amount')}}<br>
            {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>

            <p>{{Form::label('date_created','Date Created')}}<br>
                {{Form::date('date_created', '', ['style' => 'text-indent: 25px;'])}}</p>

            <p>{{Form::label('add_receipt','Add Receipt')}}</p>
            <p><a href="#" class="call-to-action"><b>+</b></a></p>
            <br>
            <p>{{Form::submit('ADD EXPENSE')}}</p>
        {!! Form::close() !!}
	</div>
@endsection
