<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
 
<h1>All Information About   Users</h1>
<table style="border:1px solid black">
        <tr style="padding:15px">

            <td>id</td>
            <td>name</td>
            <td>email</td>
          
            <td>Password</td>
            <td>created_at</td>
            <td>updated_at</td>

        </tr>
        @foreach($users as $value)
       <tr>
        <td>{{ $value->id}}</td>
        <td>{{ $value->name}}</td>
        <td>{{ $value->email}}</td>
        
        <td>{{$value->password}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        <td><a href=""><button>DELETE</a>&nbsp;<a href=""><button>EDIT</a></td>
       </tr>
        @endforeach
    </table>

 
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