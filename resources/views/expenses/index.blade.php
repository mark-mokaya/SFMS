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
        <article class="account">
            <h1>Add Expense</h1>
            <p><a href="/expenses/create" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account">
            <h1>TODAY</h1>
            {{-- <p>My {{ucFirst($Account->acc_name)}} Account<br><b>Kshs. {{number_format($Account->amount,2,".",",")}}</b> --}}
            <p>Amount Spent Today<br>Kshs. 1000.00
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d')}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>

        <article class="account">
            <h1>PAST 7 DAYS</h1>
            <p>Amount Spent In The Last 7 Days<br>Kshs. 3000.00
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d', strtotime('-1 week'))}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>

        <article class="account">
            <h1>PAST 30 DAYS</h1>
            <p>Amount Spent In The Last 30 Days<br>Kshs. 4500.00
            <br><br>
            <p><a href="/expenses/{{date('Y-m-d', strtotime('-30 days'))}}" class="call-to-action"><b>&nbsp; VIEW &nbsp;</b></a>
        </article>
    </div>  

    <div style="padding: 30px 0px;">
        <article>
            <h1>WHAT DO I MOST SPEND MY MONEY ON?</h1>  
            <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
                <canvas id="doughChart" width="10px"></canvas>    
            </div>
        </article>    
 <script>

        let line= document.getElementById('linechart').getContext('2d');
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
                position: 'right',				
            },
            tooltips:{
                enable:false
            }
        }});    
</script>
    
@endsection
