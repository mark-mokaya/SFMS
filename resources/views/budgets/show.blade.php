@extends('layouts.main')
@section('content')

<h1>{{strToUpper($budget->budget_name)}} BUDGET</h1>
<p><a href="/budgets">{{"<"}} Go Back</a></p>

<div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
		<article>
			<h1>EXPENSES</h1>
				<div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
					<canvas id="chart" width="10px"></canvas>    
				</div>       
		</article>
	</div> 
	
	<div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
		<article>
			<h1>RECORDS</h1>  
			<br>
				@foreach ($Expenses as $Expense)
				<a href="/expenses/{{$Expense->id}}/edit" style="text-decoration:none; color:#000;">
					<article style="border: 3px solid #000; width: 70%; height 40px; margin:10px auto; padding: 10px; 5px;">
						<h1>{{strtoupper($Expense->id)}}: <b>Kshs. {{number_format($Expense->amount,2,".",",")}}</b> </h1>                
					</article>
				</a>
				@endforeach
			<br><br>  
		</article>
	</div>

<script>
    	<?php  
            $val = [];
            foreach ($Expenses as $Expense) { 
                array_push($val, $Expense->amount);
            }
            
            $cat = [];
            foreach ($Expenses as $Expense) { 
                foreach ($Categories as $Category) { 
                    if ($Category->id == $Expense->category_id) { 
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
        let doughChart = new Chart(bar,{
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
                display:true,
                position: 'bottom',				
            },
            tooltips:{
                enable:false
            }
        }});         
</script>
    
@endsection
