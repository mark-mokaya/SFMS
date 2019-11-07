@include('inc.adminBar')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<html>
<head>
        <style>
      
             table {
            border-collapse: collapse;
            /* width: 100%; */
            margin-left:10%;
            /* margin: 0 auto; */

          
          
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
            background-color:#27ae60;
            color: snow;
            padding:0.5%;
            margin-left: 5%;
            margin-right:0.5%;
            font-size:20px;
            font-weight:200;
            text-align: center;

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
        
       <h3>SFMS USERS</h3>
       <div class="Table">
       <table >
         <thead>
             <tr>
            <th>id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>email</th>
            {{-- <th>Password</th> --}}
            <th>created_at</th>
            <th>updated_at</th>
            <th></th>

        </tr>
      </thead>
    <tbody>
        @foreach($users as $value)
       <tr>
        <td>{{ $value->id}}</td>
        <td>{{ $value->first_name}}</td>
        <td>{{ $value->last_name}}</td>
        <td>{{$value->username}}</td>
        <td>{{ $value->email}}</td>
        
        {{-- <td>{{$value->password}}</td> --}}
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        {{-- <td><a href="/deleteUser/{{ $value->id }}">Delete</a></td> --}}
        {{-- <td>
          <button type="submit" class="btn btn-danger" name="destroy_device">
          <span class="glyphicon glyphicon-trash"></span>
      </button></td> --}}
        <td><a class="btn btn-danger" href="delete/{{$value->id}}">Delete</a></td>
       </tr>
        @endforeach
      </tbody>
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