@extends('layouts.main')
    @section('content')
    <h1>ACCOUNT SUMMARY</h1>
        <article>
            <h1>THIS IS THE SUMMARY OF ALL YOUR EXPENSES</h1>  
            <a href="#" class="call-to-action">SEE DETAILS</a>    
            <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
                <canvas id="doughnut" width="10px"></canvas>    
            </div>    
        </article>

        <h1>MY EXPENSES</h1>

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

        <script>
                let doughnut= document.getElementById('doughnut').getContext('2d');
        
                //Global options
                Chart.defaults.global.defaultFontSize = 16;
                let Stats = new Chart(doughnut,{
                type:'doughnut',
                data:{ 
                labels:['Food','Shopping','Travel','Entertainment'],
                datasets:[{
                    label:'Monthly Spending',
                    data:[80,20,50,40],
                    backgroundColor:['#FE4A49','#2AB7CA','#FED766','#E6E6EA'],
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
    
