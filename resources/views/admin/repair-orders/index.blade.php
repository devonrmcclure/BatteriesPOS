@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Repair Orders</h1>
    
    <admin-repair-orders :location="{{Auth::user()}}"></admin-repair-orders>
</div>
@endsection