@extends('layouts.main')
@section('content')
	<h1>ADD ACCOUNT</h1>
		<div class="modal" id="reg-Modal">
			{!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST']) !!}
				<p>{{Form::label('account_name','Account Name')}}<br>
				{{Form::text('account_name', '')}}</p>
				
				<p>{{Form::label('account_type','Account Type')}}<br>
				{{Form::text('account_type', '')}}</p>

				<p>{{Form::label('amount','Amount')}}<br>
				{{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>

				<p>{{Form::label('description','Description')}}<br>
				{{Form::textarea('description', 'My Account for...', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>

				<p>{{Form::submit('ADD ACCOUNT')}}</p>

			{!! Form::close() !!}
		</div>
@endsection
 