@extends('layouts.main')
@section('content')
<h1>MY CATEGORIES</h1>
    @if(count($Categories)<1)
        <p>No Categories Created. Create Your First Category Down Below.</p>

        <article class="account add">
            <h1>Add category</h1>
            <p><a href="/categories/create" class="call-to-action"><b>+</b></a>
        </article>
    @else
        <article class="account add">
            <h1>Add Category</h1>
            <p><a href="/categories/create" class="call-to-action"><b>+</b></a>
        </article>

        @foreach ($Categories as $Category)
        <article class="account">    
            {!!Form::open(['action' => ['CategoriesController@destroy', $Category->id, 'method'=>'POST']])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('X')}}
            {!!Form::close()!!}              
            <h1>{{strtoupper($Category->category_name)}}</h1>
            <p>{{ucFirst($Category->description)}}
            <br><br>
            <p><a href="/categories/{{$Category->id}}/edit" class="call-to-action"><b>&nbsp; EDIT &nbsp;</b></a>
        </article>
        @endforeach
    @endif
@endsection
 