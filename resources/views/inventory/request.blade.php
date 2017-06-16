@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Stock Transfers</h1>

    <stock-transfer-request :location="{{Auth::user()}}"></stock-transfer-request>
</div>
@endsection