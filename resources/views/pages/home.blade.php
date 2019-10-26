@extends('layouts.main')
    @section('content')

    <div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY ACCOUNTS</h1>  
            <br>
                @foreach ($Accounts as $Account)
                <a href="/accounts/{{$Account->id}}" style="text-decoration:none; color:#000;">
                    <article style="border: 3px solid #000; width: 70%; height 40px; margin:10px auto; padding: 10px; 5px;">
                        <h1>{{strtoupper($Account->acc_name)}}: <b>Kshs. {{number_format($Account->amount,2,".",",")}}</b> </h1>                
                    </article>
                </a>
                @endforeach
                <br><br>
            <a href="/accounts" class="call-to-action">SEE DETAILS</a>        
        </article>
    </div> 
    <div style="padding: 30px 0px; background-color: #000; color: #fff; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY EXPENSES</h1>  
            <br>
            <div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
                <canvas id="doughChart" width="10px"></canvas>    
            </div>    
            <br><br>
            <a href="/expenses" class="call-to-action">SEE DETAILS</a>    
        </article>
    </div>

    <div style="padding: 30px 0px; width: 33%; height: 600px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY BUDGETS</h1>  
            <br>
            @foreach ($Budgets as $Budget)
            <a href="/budgets/{{$Budget->id}}" style="text-decoration:none; color:#000;">
                <article style="border: 3px solid #000; width: 70%; height 40px; margin:10px auto; padding: 10px; 5px;">
                    <h1>{{strtoupper($Budget->budget_name)}}: <b>Kshs. {{number_format($Budget->amount,2,".",",")}}</b> </h1>                
                </article>
            </a>
            @endforeach
            <br><br>
            <a href="/budgets" class="call-to-action">SEE DETAILS</a>    
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
                borderColor:'#000',
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
    
