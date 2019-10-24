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
            <h1>{{strtoupper($Category->category_name)}}</h1>
            <p>Money Spent on {{ucFirst($Category->category_name)}}
            <br><br>
            <p><a href="/categories/{{$Category->id}}" class="call-to-action"><b>VIEW</b></a> &nbsp; <a href="/categories/{{$Category->id}}" class="call-to-action"><b>EDIT</b></a>
        </article>
        @endforeach
    @endif
@endsection
 