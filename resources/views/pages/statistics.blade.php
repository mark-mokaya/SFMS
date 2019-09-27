{{-- @extends('layouts.app')
@section('content')
<h1>statistics</h1> 
@endsection --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Statistics</title>
</head>
<body>
<div class="container" width=50%>
<canvas id="myChart"></canvas>
<canvas id="mySec"></canvas>
</div>
<script>
    let myChart= document.getElementById('myChart').getContext('2d');
    //Global options
     Chart.defaults.global.defaultFontSize = 12;
    let Expenses = new Chart(myChart,{
      type:'line',//dft types of charts
      data:{ 
        labels:['January','February','March','April','May','June','July','August','September','November' ],
        datasets:[{
          label:'Monthly Spending',
          data:[
            80,
            20,
            50,
            40,
            50,
            30,
            70,
            40,
            90,
            100
    
          ],
          backgroundColor:[
            'rgb(128,0,5,0.6)',
            'rgb(0,128,0,0.6)',
            'rgb(255,0,0,0.6)',
            'rgb(255,255,0,0.6)',
            'rgb(0,0,128,0.6)',
            'rgb(0,255,255,0.6)',
            'rgb(255,0,255,0.6)',
            'rgb(192,192,192,0.6)',
            'rgb(0,255,0,0.6)',
            'rgb(128,0,128,0.6)'
          ],
          borderWidth:1,
          borderColor:'rgb(255,250,250)',
          hoverBorderWidth:1,
          hoverBorderColor:'#000'

        }]
      },
      options:{
          title:{
              display:true,
              text:'YOUR ANNUAL SPENDINGS'

          },
          legend:{
              display:false, 
              position:'right',
              labels:{
                  fontColor:'#000 '
              }
          },
          layouts:{
              padding:{
                  left:50,
                  right:0,
                  bottom:0,
                  top:0
              }
          },
          tooltips:{
              enable:false
          }
      },
    });

    let mySec= document.getElementById('mySec').getContext('2d');
    //Global options
     Chart.defaults.global.defaultFontSize = 12;
    let Spendings = new Chart(mySec,{
      type:'doughnut',//dft types of charts
      data:{ 
        labels:['January','February','March','April','May','June','July','August','September','November' ],
        datasets:[{
          label:'Monthly Spending',
          data:[
            80,
            20,
            50,
            40,
            50,
            30,
            70,
            40,
            90,
            100
    
          ],
          backgroundColor:[
            'rgb(128,0,5,0.6)',
            'rgb(0,128,0,0.6)',
            'rgb(255,0,0,0.6)',
            'rgb(255,255,0,0.6)',
            'rgb(0,0,128,0.6)',
            'rgb(0,255,255,0.6)',
            'rgb(255,0,255,0.6)',
            'rgb(192,192,192,0.6)',
            'rgb(0,255,0,0.6)',
            'rgb(128,0,128,0.6)'
          ],
          borderWidth:1,
          borderColor:'rgb(255,250,250)',
          hoverBorderWidth:1,
          hoverBorderColor:'#000'

        }]
      },
      options:{
          title:{
              display:true,
              text:'YOUR ANNUAL SPENDINGS'

          },
          legend:{
              display:false, 
              position:'right',
              labels:{
                  fontColor:'#000 '
              }
          },
          layouts:{
              padding:{
                  left:50,
                  right:0,
                  bottom:0,
                  top:0
              }
          },
          tooltips:{
              enable:false
          }
      },
    });
    </script>
</body>
</html>