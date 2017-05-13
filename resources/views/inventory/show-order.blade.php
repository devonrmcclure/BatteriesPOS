@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Stock Transfers</h1>
    {{-- <inventory-info :location="{{ Auth::User() }}"></inventory-info> --}}
    <div class="col-md-12 module-container">
        <stock-transfer-order :location={{Auth::user()}}></stock-transfer-order>
    </div>
</div>
@endsection