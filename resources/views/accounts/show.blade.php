@extends('layouts.main')
@section('content')
<h1>{{strToUpper($account->acc_name)}}</h1>

<article>
    <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
        <canvas id="line" width="10px"></canvas>    
    </div>    
</article>
    
@endsection
