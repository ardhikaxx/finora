@extends('layouts.app')
@section('title', 'Customer Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">{{ $customer->name }}</h5></div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p><strong>Address:</strong> {{ $customer->address }}</p>
    </div>
</div>
@endsection
