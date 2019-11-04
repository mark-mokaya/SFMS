@extends('layouts.main')
@section('content')

<div style="width: 1060px; margin: 20px auto; border: 5px solid #000;">
    <h1>{{strToUpper($budget->budget_name)}} BUDGET</h1>
    <h2>Remaining: <b style="color: #2ecc71;">Ksh. {{$budget->amount_remaining}}</b></h2>
    <p>{{ucfirst($budget->description)}}<br>
    <p><a href="/budgets">{{"<"}} Go Back</a></p>
</div>

<div style="width: 500px; height: 600px; padding: 30px 0px; margin: 20px 10px; border: 5px solid #000; display:inline-block; overflow: hidden;">
		<article>
			<h1>EXPENSES</h1>
				<div style="width: 500px; overflow:hidden; margin: 50px auto;">
					<canvas id="chart" width="10px"></canvas>    
				</div>       
		</article>
	</div> 
	
    <div style="width: 500px; height: 600px; padding: 30px 0px; margin: 20px 10px; border: 5px solid #000; display:inline-block; overflow: hidden;">
        <h1>RECORDS</h1> 
		<article style="height: 72%; overflow-y: auto;">
            @foreach ($Expenses as $Expense)
            <a href="/expenses/{{$Expense->id}}/edit" style="text-decoration:none; color:#000;">
                <article style="border: 3px solid #000; width: 70%; height 40px; margin:10px auto; padding: 10px; 5px;">
                    @foreach($Categories as $Category)
                        @if($Category->id == $Expense->category_id)
                            <h4 style="margin: 5px;">{{strtoupper($Category->category_name)}}: Kshs. {{number_format($Expense->amount,2,".",",")}} </h4>
                                <small>{{$Expense->date_created}}</small></p>
                        @endif
                    @endforeach              
                </article>
            </a>
            @endforeach
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
       
            $budget_val = [];
            $days = date('d', strtotime($budget->period) - strtotime(date("Y-m-d")));
            $daily_limit =  (int) ($budget->amount / $days);
   
            foreach ($ExpensesByDate as $Expense) { 
                array_push($budget_val, $daily_limit);
            }
        ?>

        var groups = <?php echo json_encode($cat);?>;        
        var values = <?php echo json_encode($val);?>;
        var budget_values = <?php echo json_encode($budget_val);?>;

        
    	let bar= document.getElementById('chart').getContext('2d');
        
        //Global options
        Chart.defaults.global.defaultFontSize = 16;
        let barChart = new Chart(bar,{
        type:'bar',
        data:{ 
        labels:groups,
        datasets:[{
            label: 'Daily Limit',
            data: budget_values,
            backgroundColor:'#FE4A49',
            borderWidth:2,
            borderColor:'#fff',
            hoverBorderWidth:0,
            hoverBorderColor:'#000'
        },{
            label: 'The Day\'s Expenses',
            data: values,
            backgroundColor:'#FF9124',
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
                display:true,
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
