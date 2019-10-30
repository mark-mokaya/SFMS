@extends('layouts.main')
@section('content')

<div style="width: 82%; margin: 20px auto; border: 5px solid #000;">
    <h1>{{strToUpper($Account->acc_name)}} ACCOUNT</h1>
    <h2>Remaining: <b style="color: #2ecc71;">Ksh. {{$Account->amount}}</b></h2>
    <p>{{ucfirst($Account->description)}}<br>
    <a href="/accounts">{{"<"}} Go Back</a></p>
</div>

<div style="width: 40%; height: 600px; padding: 30px 0px; margin: 20px 10px; border: 5px solid #000; display:inline-block; overflow: hidden;">
	
        <h1>EXPENSES</h1>
    <article>
			<div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
				<canvas id="doughChart" width="10px"></canvas>    
			</div>       
	</article>
</div> 

<div style="width: 40%; height: 600px; padding: 30px 0px; margin: 20px 10px; border: 5px solid #000; display:inline-block; overflow: hidden;">
	
		<h1>RECORDS</h1>  
    <article style="height: 80%; overflow-y: auto;">
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
        
    	let doughnut= document.getElementById('doughChart').getContext('2d');
        
        //Global options
        Chart.defaults.global.defaultFontSize = 16;
        let doughChart = new Chart(doughnut,{
        type:'doughnut',
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
