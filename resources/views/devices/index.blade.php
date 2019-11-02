@include('inc.adminBar')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
        <style>
                /* body{
                  background:url(/images/water.jpg);
                  background-size: cover;
                } */
             table {
            border-collapse: collapse;
            /* width: 100%; */
          }
          
          th, td {
            text-align: left;
            padding: 10px;
          }
          
          tr:nth-child(even){background-color: #f2f2f2}
          tr:nth-child(odd){background-color: white}
          
          th {
            background-color:	#e3f2fd;
            color: #7e8681;
            font-size:20px;
            font-weight:500;
            text-transform: uppercase;
          }
          Table{
              /* width:20%; */
              /* margin-left: 10%; */
              width:80%;
          
          }
          h1{
              margin-left: 20%;
              width:20%;
              background-color:white;
              
          }
          head{
            width:80%;
          }
             </style>
</head>
<body>
 
        <br> 
        <br><br>
       <h4>SFMS USERS</h4>
       <div class="Table">
       <table >
               <tr style="padding: 20px">

            <td>id</td>
            <td>First_name</td>
            <td>Last_name</td>
            <td>Username</td>
            <td>email</td>
          
            <td>Password</td>
            <td>created_at</td>
            <td>updated_at</td>

        </tr>
        @foreach($users as $value)
       <tr>
        <td>{{ $value->id}}</td>
        <td>{{ $value->first_name}}</td>
        <td>{{ $value->last_name}}</td>
        <td>{{$value->username}}</td>
        <td>{{ $value->email}}</td>
        
        <td>{{$value->password}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        {{-- <td><a href=""><button>DELETE</a>&nbsp;<a href=""><button>EDIT</a></td> --}}
       </tr>
        @endforeach
    </table>

</div>
{{-- @foreach ($devices as $device)
<li> {{ $device}}  </li>
@endforeach
 
<h1>Only Names Of Devices</h1>
 
@foreach ($devices as $device)
 
<li> {{ $device->name}}  </li>
 
@endforeach
 
<h1>Only Description Of Devices</h1>
 
@foreach ($devices as $device)
 
<li> {{ $device->description}}  </li>
 
@endforeach --}}
    
</body>