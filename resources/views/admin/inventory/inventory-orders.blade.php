@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin Dashboard <small>{{$date}}</small></h1>
        <admin-inventory-orders :location="{{ Auth::User() }}"></admin-inventory-orders>
    </div>
</div>
@endsection
