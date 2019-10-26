@extends('layouts.main')
@section('content')
	<h1>ADD CATEGORY</h1>
		<div class="modal" id="reg-Modal">
			{!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
				<p>{{Form::label('category_name','Category Name')}}<br>
				{{Form::text('category_name', '')}}</p>
				
				<p>{{Form::label('description','Description')}}<br>
				{{Form::textarea('description', 'Money spent on...', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>

				<p>{{Form::submit('ADD CATEGORY')}}</p>

			{!! Form::close() !!}
		</div>
@endsection
 