@extends('layouts.main')
@section('content')
    <h1>EDIT RECEIPT</h1>
        <div class="form_container" id="reg-Modal">            
            {!! Form::open(['action' => ['ReceiptsController@update', $Receipt->id], 'method' => 'POST']) !!}
            
                <p><img src="/storage/receipts/{{$Receipt->img_path}}" style="max-height: 300px;"></p>
                
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
                {{Form::textarea('description', $Receipt->description, ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>		

                {{Form::hidden('_method', 'PUT')}}

                <p> <input type="submit" name="action" value="EDIT RECEIPT">
            {!! Form::close() !!}
        </div>
@endsection



