@extends('layouts.main')
@section('content')

    <div class="" style="padding: 30px 0px; background-color: #121212; color: #fff;">
        <h1>MY EXPENSES</h1>
        <article>
            <h1>HOW DO I SPEND MY MONEY?</h1>  
            <div style="max-width: 700px; overflow:hidden; margin: 50px auto;">
                <canvas id="linechart" width="10px"></canvas>    
            </div>
        </article>

        <article class="account">
            <h1>Add Expense</h1>
            <p><a href="/expenses/create" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account">
            <h1>TODAY</h1>
            <p>Kshs. 1000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account">
            <h1>THIS WEEK</h1>
            <p>Kshs. 3000.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
        </article>

        <article class="account">
            <h1>THIS MONTH</h1>
            <p>Kshs. 4500.00 &nbsp; <a href="#" class="call-to-action"><b>+</b></a>
        </article>
    </div>  

    <div class="" style="padding: 30px 0px;">
        <article>
            <h1>HOW DO I SPEND MY MONEY?</h1>  
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

    	let doughnut= document.getElementById('doughChart').getContext('2d');
        
        //Global options
        Chart.defaults.global.defaultFontSize = 16;
        let doughChart = new Chart(doughnut,{
        type:'doughnut',
        data:{ 
        labels:['Food','Shopping','Travel','Entertainment', 'Others'],
        datasets:[{
            label:'Monthly Spending',
            data:[80,20,50,40,30],
            backgroundColor:['#FE4A49', '#FF9124','#059BFF','#FED766','#E6E6EA'],
            borderWidth:2,
            borderColor:'#fff',
            hoverBorderWidth:0,
            hoverBorderColor:'#fff'
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
