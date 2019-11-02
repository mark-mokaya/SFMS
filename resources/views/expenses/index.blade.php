@extends('layouts.main')
@section('content')

    <div style="padding: 30px 0px; background-color: #121212; color: #fff;">
        <h1>MY EXPENSES</h1>
        <article>
            <h1>HOW DO I SPEND MY MONEY?</h1>  
            <div style="max-width: 700px; overflow:hidden; margin: 50px auto;">
                <canvas id="linechart" width="10px"></canvas>    
            </div>
        </article>
    </div>

    <div style="padding: 30px 0px;">
        <article class="account add">
            <h1>Add Expense</h1>
            <br><a href="/expenses/create" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account">
            <h1>TODAY</h1>
            {{-- <p>My {{ucFirst($Account->acc_name)}} Account<br><b>Kshs. {{number_format($Account->amount,2,".",",")}}</b> --}}
            <p>Amount Spent Today<br>
                <?php
                    $amount = 0;
                    foreach ($ExpensesByDate as $Expense) {
                        if ($Expense->date_created == date('Y-m-d')) {
                            $amount += $Expense->amount;
                        }
                    }
                    echo "Kshs. ".number_format($amount,2,".",",");
                ?>
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d')}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>

        <article class="account">
            <h1>PAST 7 DAYS</h1>
            <p>Amount Spent In The Last 7 Days<br>
                <?php 
                    $amount = 0;
                    foreach ($ExpensesByDate as $Expense) {
                        if ($Expense->date_created >= date('Y-m-d', strtotime('-1 week'))) {
                            $amount += $Expense->amount;
                        }
                    }
                    echo "Kshs. ".number_format($amount,2,".",",");
                ?>
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d', strtotime('-1 week'))}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>

        <article class="account">
            <h1>PAST 30 DAYS</h1>
            <p>Amount Spent In The Last 30 Days<br>
                <?php 
                    $amount = 0;
                    foreach ($ExpensesByDate as $Expense) {
                        if ($Expense->date_created >= date('Y-m-d', strtotime('-1 month'))) {
                            $amount += $Expense->amount;
                        }
                    }
                    echo "Kshs. ".number_format($amount,2,".",",");
                ?>
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d', strtotime('-1 month'))}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>
    </div>  

    <div style="padding: 30px 0px;">
        <article>
            <h1>WHAT DO I SPEND MOST OF MY MONEY ON?</h1>  
            <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
                <canvas id="doughChart" width="10px"></canvas>    
            </div>
        </article>    
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
        

        let line= document.getElementById('linechart').getContext('2d');
		let lineChart = new Chart(line,{
		type:'line',
		data:{ 
            labels:groups,
            datasets:[{
                label: 'Expenses',
                data: values,
                borderWidth:2,
                borderColor:'#FE4A49',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'

            }]},
		options:{
			title:{
				display:false
			},
			legend:{
				display:true,		
			},
			tooltips:{
				enable:true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
        }}); 

        <?php  
            $val = [];
            foreach ($ExpensesByCategory as $Expense) { 
                array_push($val, $Expense->amount);
            }
            
            $cat = [];
            foreach ($ExpensesByCategory as $Expense) { 
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
            borderColor:'#000',
            hoverBorderWidth:3,
            hoverBorderColor:'#000'
        }]},
        options:{
            title:{
                display:false
            },
            legend:{
                display:true,
                position: 'right',				
            },
            tooltips:{
                enable:false
            }
        }});    
</script>
    
@endsection
