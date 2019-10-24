@extends('layouts.main')
    @section('content')
    {{-- <h1>SUMMARY OF MY FINANCES</h1> --}}

    <div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY ACCOUNTS</h1>  
            <a href="/accounts" class="call-to-action">SEE DETAILS</a>        
        </article>
    </div> 
    <div style="padding: 30px 0px; background-color: #121212; color: #fff; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY EXPENSES</h1>  
            <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
                <canvas id="chart" width="10px"></canvas>    
            </div>    
            <a href="/expenses" class="call-to-action">SEE DETAILS</a>    
        </article>
    </div>

    <div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY BUDGETS</h1>  
            <a href="/budgets" class="call-to-action">SEE DETAILS</a>    
        </article>
    </div>

        <script>
            let doughnut= document.getElementById('chart').getContext('2d');
    
            //Global options
            Chart.defaults.global.defaultFontSize = 16;
            let Stats = new Chart(doughnut,{
                type:'doughnut',
                data:{ 
                labels:['Food','Shopping','Travel','Entertainment', 'Others'],
                datasets:[{
                    label:'Monthly Spending',
                    data:[80,20,50,40,30],
                    backgroundColor:['#FE4A49', '#FF9124','#059BFF','#FED766','#E6E6EA'],
                borderWidth:5,
                borderColor:'#121212',
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
    
