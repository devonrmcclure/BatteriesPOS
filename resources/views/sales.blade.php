@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Sales <small>{{$date}}</small></h1>
	<div class="col-md-6 module-container">
		<div class="module">
			<h3>Daily Sales Stats</h3>
			<p>Items Sold: {{$itemsSold}}</p>
			<p>Total Sales: ${{$totalSales}}</p>
		</div>
	</div>
</div>
@endsection
