@extends('layouts.main')
@section('content')

<h1>EXPENSES FOR {{strToUpper($Title)}}</h1>
<p><a href="/expenses">{{"<"}} Go Back</a></p>

	<div style="padding: 30px 0px;">
        <article>
            <div style="max-width: 700px; overflow:hidden; margin: 50px auto;">
                <canvas id="chart" width="10px"></canvas>    
            </div>
        </article>
    </div>
	
	<div style="padding: 30px 0px; height: 600px; overflow: hidden;">
		<article>
			<h1>RECORDS</h1>  
			<br>
				
			<br><br>  
		</article>
	</div>

<script>
		<?php  
            $val = [];
            foreach ($ExpensesByDate as $Expense) { 
                array_push($val, $Expense->amount);
            }
            
            $cat = [];
            foreach ($ExpensesByDate as $Expense) { 
                array_push($cat,$Expense->date_created);
            }
        ?>

        var groups = <?php echo json_encode($cat);?>;        
        var values = <?php echo json_encode($val);?>;

    	let line= document.getElementById('chart').getContext('2d');
		let lineChart = new Chart(line,{
		type:'line',
		data:{ 
		labels:['Food','Shopping','Travel','Entertainment'],
		datasets:[{
			label:'Monthly Spending',
			data: []
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
