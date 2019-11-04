@include('inc.adminBar')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
        <style>
      
             table {
            border-collapse: collapse;
            /* width: 100%; */
            margin-left:2%;
          
          
          }
          
          td {
            text-align: center;
            padding: 0.5%;
            border:2px;
            border-color:black;
          }
          
          tr:nth-child(even){background-color: #f2f2f2}
          tr:nth-child(odd){background-color: white}
          
          th {
            background-color:	white;
            color: #7e8681;
            padding:0.5%;
            margin-right:0.5%;
            font-size:20px;
            font-weight:200;
            /* text-transform: uppercase; */
          }
          Table{
              /* width:20%; */
              margin-right: 70%;
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
          h3{
            text-align: center;
            font-weight:200;
          }
             </style>
</head>
<body>
 
        <br> 
        <br><br>
       <h3>SFMS USERS</h3>
       <div class="Table">
       <table >
               <tr style="padding: 20px">

            <th>id</th>
            <th>First_name</th>
            <th>Last_name</th>
            <th>Username</th>
            <th>email</th>
          
            <th>Password</th>
            <th>created_at</th>
            <th>updated_at</th>

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