@extends('layouts.app')
@section('content')
<h1>Transactions</h1> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
   <form action="/transactions.php" method="POST">
    <label for="NAME">NAME:</label>
    <input type="text"name="NAME">
    <br>
    <label for="category"> CATEGORY</label>
<input type="text" name="category">
<br>
  
  <button style='font-size:24px' href=
  >Button <i class='fas fa-folder-plus'></i></button>
</form>
</body>
</html>
@endsection

