@extends('layouts.main')
@section('content')
	<h1>ADD ACCOUNT</h1>
		<div class="modal" id="reg-Modal">
			<form action="accounts.php" method="post">
				<p><label>Account Name</label><br>
				<input type="text" name="acc_name"></p>

				<p><label>Account Type</label><br>
				<input type="text" name="acc_type"></p>

				<p><label>Amount</label><br>
				<input type="text" name="amount"></p>
				
				<p><label>Description</label><br>
				<textarea name="description" cols="43" rows="5" style="resize:none"></textarea>
				
				<p><input type="submit" name="add_account" value="ADD ACCOUNT"></p>
			</form>
		</div>
@endsection
