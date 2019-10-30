@extends('layouts.main')
@section('content')
	<h1>ADD RECEIPT</h1>
	<div class="form_container">
		<form action="" method="post">
			<p><label>Category</label><br>
			<input type="text" name="category"></p>

			<p><label>Description</label><br>
			<textarea name="description" cols="43" rows="5" style="resize:none"></textarea>

			<p><label>Upload Receipt</label><br>
			<!-- <input type="file" name="receipt"> -->
			<p><a href="" class="call-to-action"><b>+</b></a>
			<br><br>

			<p><input type="submit" name="add_receipt" value="ADD RECEIPT"></p>
			
		</form>
	</div>
@endsection
