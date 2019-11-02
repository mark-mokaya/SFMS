@extends('layouts.main')
@section('content')
    <h1>ADD RECEIPT</h1>
        <div class="form_container" id="reg-Modal">
            <img src={{$Receipts->img_path}} alt="">
			{!! Form::open(['action' => 'ReceiptsController@update', 'method' => 'POST']) !!}
				<p>{{Form::label('category','Category')}}<br>
					<?php 
						$list=[];
						foreach ($Categories as $Category) {
							$list[$Category->id] = $Category->category_name;
						}
					?>
                {{Form::select('category', $list, $Receipt->category_id, ['style' => 'text-align-last:center;'])}} <a href="/categories/create" class="call-to-action"><b>+</b></a></p>
                
                <p>{{Form::label('amount','Amount')}}<br>
                    {{Form::number('amount', $Receipt->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', 'My receipt for ', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>		

                <p>{{Form::submit('ADD RECEIPT')}}</p>
            {!! Form::close() !!}
        </div>
@endsection

