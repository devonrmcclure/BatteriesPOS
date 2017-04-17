@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Invoices <small>{{$date}}</small></h1>
    <invoice-info :location="{{ Auth::User() }}"></invoice-info>
</div>
@endsection
