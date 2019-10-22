@extends('layouts.main')
@section('content')

<h1>{{strToUpper($budget->budget_name)}} BUDGET</h1>
<p><a href="/budgets">{{"<"}} Go Back</a></p>

<article>
    <div style="max-width: 70%; overflow:hidden; margin: 50px auto;">
        <canvas id="chart"></canvas>    
    </div>    
</article>

<script>
    	let myChart= document.getElementById('chart').getContext('2d');
		let Stats = new Chart(myChart,{
		type:'line',
		data:{ 
		labels:['Food','Shopping','Travel','Entertainment'],
		datasets:[{
			label:'Monthly Spending',
			data:[80,20,50,40]
		}]},
		options:{
			title:{
				display:false
			},
			legend:{
				display:false,		
			},
			tooltips:{
				enable:true
			}
        }});        
</script>
    
@endsection
