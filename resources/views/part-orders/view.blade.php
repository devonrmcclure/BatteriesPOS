@extends('layouts.app')

@section('content')
<div class="content">
    <h1>View Part Order</h1>
    <div class="col-md-12 module-container">
        <div class="module">
            <view-part-order :location="{{Auth::user()}}"></view-part-order>
        </div>
    </div>
</div>
@endsection
