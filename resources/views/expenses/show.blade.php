@extends('layouts.main')
@section('content')

<h1>{{strToUpper('Today\'s')}} EXPENSES</h1>
<p><a href="/expenses">{{"<"}} Go Back</a></p>

<div style="padding: 30px 0px; width: 100%; height: 600px; overflow: hidden;">
		<article>
				<div style="max-width: 500px; overflow:hidden; margin: 50px auto;">
					<canvas id="chart" width="10px"></canvas>    
				</div>       
		</article>
	</div> 
	
	<div style="padding: 30px 0px; height: 600px; overflow: hidden;">
		<article>
			<h1>RECORDS</h1>  
			<br>
				
			<br><br>  
		</article>
	</div>

<script>
    	
</script>
    
@endsection
