@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Purchase History <small>{{$date}}</small></h1>
	<div class="col-md-6 module-container">
		<div class="module">
			<h3>Previous 5 Purchases</h3>
			<hr />
				<ul>
					@foreach($previousPurchases as $purchase)
						{{$purchase->invoice_id}}<br />
					@endforeach
				</ul>
			<br />
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newPurchase">
			  New Purchase
			</button>
		</div>


		@include('admin.history.new')
	</div>
</div>
@endsection
