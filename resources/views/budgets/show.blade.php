@extends('layouts.main')
@section('content')

<h1>{{strToUpper($budget->budget_name)}} BUDGET</h1>

<article>
    <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
        <canvas id="chart" width="10px"></canvas>    
    </div>    
    <a href="/budgets">{{"<"}} Go Back</a>
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
