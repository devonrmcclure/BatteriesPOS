@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Invoices <small>{{$date}}</small></h1>
    <invoice :location="{{ Auth::User() }}"></invoice>
</div>
@endsection
