
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This p.age gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script type="text/javascript" src="https://gc.kis.scr.kaspersky-labs.com/B3699290-AFBE-DF45-97A8-62D5B0EEE562/main.js" charset="UTF-8"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.css"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
{{-- <script src="dist/js/adminlte.min.js"></script> --}}
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper"id="app" >

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="account" class="nav-link">Accounts</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="statistics" class="nav-link">Statistics</a>
      </li>
      <li><a href="categories" class="nav-link">Categories</a></li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
      
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/profile.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MONEY APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/19685.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </router-link>
            
            </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <router-link to="/profile" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile
                </p>
              </router-link>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>
                    logout
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <router-view></router-view>
        <div class="row">
        
          <!-- /.col-md-6 -->
        </div>
      </div>
    </div><body>
      <div class="container" width=50%>
      <canvas id="myChart"></canvas>
      <canvas id="mySec"></canvas>
      </div>
      
  
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
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
          'rgb(0,0,128,0.6)',
          'rgb(128,0,5,0.6)',
          'rgb(0,128,0,0.6)',
          'rgb(255,0,0,0.6)',
          'rgb(255,255,0,0.6)',
     
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
          'rgb(0,0,128,0.6)',
          'rgb(128,0,5,0.6)',
          'rgb(0,128,0,0.6)',
          'rgb(255,0,0,0.6)',
          'rgb(255,255,0,0.6)',
       
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
 