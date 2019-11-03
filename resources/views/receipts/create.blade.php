@extends('layouts.main')
@section('content')
    <h1>ADD RECEIPT</h1>
        <div class="form_container" id="reg-Modal">
			{!! Form::open(['action' => 'ReceiptsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
            @if(isset($Expense))
            {{Form::hidden('expense', $Expense->id)}}
            @endif
			
			<p>{{Form::label('category','Category')}}<br>
                <?php 
                    $list=[];
                    foreach ($Categories as $Category) {
                        $list[$Category->id] = $Category->category_name;
                    }
                ?>
				@if(isset($Expense))
					{{Form::text('category_name', $list[$Expense->category_id], ['readonly'=> true])}}</p>
					{{Form::hidden('category', $Expense->category_id)}}
				@else
					{{Form::select('category', $list, null, ['placeholder' => '', 'style' => 'text-align-last:center;'])}} <a href="/categories/create" class="call-to-action"><b>+</b></a></p>
				@endif
				
				<p>{{Form::label('receipt','Upload Receipt')}}<br>
				{{Form::file('receipt')}}</p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', 'My receipt for ', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>		

                <p>{{Form::submit('ADD RECEIPT')}}</p>

            {!! Form::close() !!}
        </div>
@endsection

