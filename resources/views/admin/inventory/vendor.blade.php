@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin Dashboard <small>{{$date}}</small></h1>
        <admin-vendor-orders :location="{{ Auth::User() }}"></admin-vendor-orders>
    </div>
</div>
@endsection
