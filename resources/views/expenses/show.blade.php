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
<script>
		<?php
            $val = [];
            foreach ($ExpensesByCategory as $Expense) { 
                array_push($val, $Expense->amount);
            }
            
            $cat = [];
            foreach ($ExpensesByCategory as $Expense) { 
				foreach($Categories as $Category){
					if($Category->id == $Expense->category_id){				
                		array_push($cat,$Category->category_name);
					}
				}
            }
        ?>

        var groups = <?php echo json_encode($cat);?>;        
        var values = <?php echo json_encode($val);?>;
        
    	let bar= document.getElementById('chart').getContext('2d');
        
        //Global options
        Chart.defaults.global.defaultFontSize = 16;
        let barChart = new Chart(bar,{
        type:'bar',
        data:{ 
        labels:groups,
        datasets:[{
            data: values,
            backgroundColor:['#FE4A49', '#FF9124','#059BFF','#FED766','#E6E6EA'],
            borderWidth:2,
            borderColor:'#fff',
            hoverBorderWidth:0,
            hoverBorderColor:'#000'
        }]},
        options:{

            title:{
                display:false
            },
            legend:{
                display:false,
                position: 'bottom',				
            },
            tooltips:{
                enable:false
            },
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
        }});         
</script>
    
@endsection
