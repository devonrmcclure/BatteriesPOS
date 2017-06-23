@extends('layouts.app')

@section('content')
<div class="content">
    <h1>View Repair Order</h1>
    <div class="col-md-12 module-container">
        <div class="module">
            <view-repair-order :location="{{Auth::user()}}"></view-repair-order>
        </div>
    </div>
</div>
@endsection
