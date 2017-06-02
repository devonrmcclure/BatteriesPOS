@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Stock Transfers</h1>

    <stock-transfer-order :location="{{Auth::user()}}"></stock-transfer-order>
</div>
@endsection