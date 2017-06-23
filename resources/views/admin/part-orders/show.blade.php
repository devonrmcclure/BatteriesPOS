@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Part Orders</h1>
    
    <admin-part-orders-show :location="{{Auth::user()}}" :id="{{$id}}"></admin-part-orders-show>
</div>
@endsection