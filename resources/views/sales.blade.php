@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Sales <small>{{$date}}</small></h1>
	<div class="col-md-6 module-container">
		<div class="module">
			<h3>Daily Sales Stats</h3>
			<hr />
			<table class="sales-stats">
				<tr>
					<th>Invoices</th>
					<th>Items Sold</th>
					<th>Total Sales</th>
					<th>Items/Invoice</th>
					<th>Sales/Invoice</th>
				</tr>
				<tr>
					<td>{{$totalInvoices}}</td>
					<td>{{$itemsSold}}</td>
					<td>${{$totalSales}}</td>
					<td>{{$itemsPerInvoice}}</td>
					<td>${{$salesPerInvoice}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection
