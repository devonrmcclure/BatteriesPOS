@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Stock Transfers</h1>
    
    <stock-transfer-history :location="{{Auth::user()}}"></stock-transfer-history>
</div>
@endsection