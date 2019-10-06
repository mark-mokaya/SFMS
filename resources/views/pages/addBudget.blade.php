@extends('layouts.main')
@section('content')
	<h1>ADD BUDGET</h1>
		<div class="modal" id="reg-Modal">
			<form action="" method="post">
				<p><label>Budget Name</label><br>
				<input type="text" name="budget_name"></p>

				<p><label>Amount</label><br>
				<input type="text" name="amount"></p>
				
				<p><label>Description</label><br>
				<textarea name="description" cols="43" rows="5" style="resize:none"></textarea>
				
				<p><input type="submit" name="add_budget" value="ADD BUDGET"></p>
			</form>
		</div>
@endsection
