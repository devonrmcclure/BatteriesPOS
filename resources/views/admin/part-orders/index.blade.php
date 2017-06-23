@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Part Orders</h1>
    
    <admin-part-orders :location="{{Auth::user()}}"></admin-part-orders>
</div>
@endsection