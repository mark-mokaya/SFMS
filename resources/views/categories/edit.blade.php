@extends('layouts.main')
@section('content')
	<h1>EDIT CATEGORY</h1>
		<div class="modal" id="reg-Modal">
			{!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}
				<p>{{Form::label('category_name','Category Name')}}<br>
				{{Form::text('category_name', $category->category_name)}}</p>
				
				<p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description',  $category->description, ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>
                
                {{Form::hidden('_method', 'PUT')}}

				<p>{{Form::submit('EDIT CATEGORY')}}</p>

			{!! Form::close() !!}
		</div>
@endsection
 