@extends('layouts.main')
    @section('content')
    <div style="padding: 0px 0px 0px; width: 400px; height: 700px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY ACCOUNTS</h1>  
            <br>
            @if(isset($Accounts))
                @foreach ($Accounts as $Account)
                <a href="/accounts/{{$Account->id}}" style="text-decoration:none; color:#000;">
                    <article style="border: 3px solid #000; width: 70%; height 40px; margin: 10px auto; padding: 10px; 5px;">
                        <h1 style="font-size: 18px;">{{strtoupper($Account->acc_name)}}: <b>Kshs. {{number_format($Account->amount,2,".",",")}}</b> </h1>                
                    </article>
                </a>
                @endforeach
            @endif
                <br><br>
            <a href="/accounts" class="call-to-action">SEE DETAILS</a>        
        </article>
    </div> 
    <div style="padding: 0px 0px 0px; color: #000; width: 400px; height: 700px; display:inline-block; overflow: hidden;">
        <article style="background-color: #121212; color: #fff; overflow: auto;">
            <h1>MY EXPENSES</h1>
            <div style="max-width: 400px;  margin: 50px auto;">
                <canvas id="doughChart" width="10px"></canvas> 
                <br><br>
                <a href="/expenses" class="call-to-action reverse">SEE DETAILS</a>     
            </div>    
        </article>
        <article style="padding: 10px;">
                <h1>MY THEMES</h1>  
                <a href="#"><div style="width:75px; height:75px; background-color: #27ae60; display: inline-block;"></div></a>
                <br><br>
            </article>
    </div>

    <div style="padding: 0px 0px 0px; width: 400px; height: 700px; display:inline-block; overflow: hidden;">
        <article>
            <h1>MY BUDGETS</h1>  
            <br>
            @if(isset($Budgets))
            @foreach ($Budgets as $Budget)
            <a href="/budgets/{{$Budget->id}}" style="text-decoration:none; color:#000;">
                <article style="border: 3px solid #000; width: 70%; height 40px; margin:10px auto; padding: 10px; 5px;">
                    <h1 style="font-size: 18px;">{{strtoupper($Budget->budget_name)}}: <b>Kshs. {{number_format($Budget->amount_remaining,2,".",",")}}</b> </h1>                
                </article>
            </a>
            @endforeach
            @endif
            <br><br>
            <a href="/budgets" class="call-to-action">SEE DETAILS</a>    
        </article>
    </div>

        <script>
            <?php  
            $val = []; 
            $cat = [];
            if(isset($Expenses)){
                
                foreach ($Expenses as $Expense) { 
                    array_push($val, $Expense->amount);
                }
                
                
                foreach ($Expenses as $Expense) { 
                    foreach ($Categories as $Category) { 
                        if ($Category->id == $Expense->category_id) { 
                            array_push($cat,$Category->category_name);
                        }
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
                borderColor:'#121212',
                hoverBorderWidth:0,
                hoverBorderColor:'#121212'
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
    
