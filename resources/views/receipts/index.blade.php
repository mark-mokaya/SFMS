@extends('layouts.main')
@section('content')
<h1>MY RECEIPTS</h1>
    @if(count($Receipts)<1)
        <p>No Receipts Added. Add Your First Receipt Down Below.</p>

        <article class="account add">
            <h1>Add Receipt</h1>
            <p>As A New Expense<br><br>
            <a href="/expenses/create" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account add">
            <h1>Add Receipt</h1>
            <p>As An Independent Record<br><br>
            <a href="/receipts/create" class="call-to-action"><b>+</b></a>
        </article>
    @else
        <article class="account add">
            <h1>Add Receipt</h1>
            <p>As A New Expense<br><br>
            <a href="/expenses/create" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account add">
            <h1>Add Receipt</h1>
            <p>As An Independent Record<br><br>
            <a href="/receipts/create" class="call-to-action"><b>+</b></a>
        </article>

        @foreach ($Receipts as $Receipt)
        <article class="account">
            {!!Form::open(['action' => ['ReceiptsController@destroy', $Receipt->id, 'method'=>'POST']])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('X')}}
            {!!Form::close()!!}
            <img src="" style="width: 100px; height: 100px;">
            <p>{{ucFirst($Receipt->description)}}<br>Total: <b>Kshs. {{number_format($Receipt->amount,2,".",",")}}</b>
            <br><br>
            <p><a href="/receipts/{{$Receipt->id}}" class="call-to-action"><b>VIEW</b></a> &nbsp; 
                <a href="/receipts/{{$Receipt->id}}/edit" class="call-to-action"><b>EDIT</b></a>
       
        </article>
        @endforeach
    @endif
@endsection
 