@extends('layouts.app')

@section('content')
<div class="content">
	<h1>Inventory <small>{{$date}}</small></h1>
	<div class="col-md-12 module-container">
		<div class="module">
			<inventory :location="{{ Auth::User() }}"></inventory>
		</div>
	</div>
</div>
@endsection