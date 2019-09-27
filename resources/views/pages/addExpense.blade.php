@extends('layouts.main')
@section('content')
	<h1>ADD EXPENSE</h1>
	<div class="modal" id="">
		<form action="" method="post">

			<p><label>Category</label><br>
			<input type="text" name="category"></p>

			<p><label>Account Name</label><br>
			<input type="text" name="acc_name"></p>

			<p><label>Amount</label><br>
			<input type="text" name="amount"></p>

			<p><label>Add Receipt</label><br>
			<p><a href="addReceipt" class="call-to-action"><b>+</b></a>
			<br><br>
			<p><input type="submit" name="add_expense" value="ADD EXPENSE"></p>
			
		</form>
	</div>
@endsection
