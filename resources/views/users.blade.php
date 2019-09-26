@extends('layouts.app')

@section('content')
<h1>Expenditure Graph</h1>

<div style="width: 50%">
    
    {!! $usersChart->container() !!}
</div>
@endsection 