@extends('layouts.app')
@section('title', 'Vendor Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">{{ $vendor->name }}</h5></div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $vendor->email }}</p>
        <p><strong>Phone:</strong> {{ $vendor->phone }}</p>
        <p><strong>Address:</strong> {{ $vendor->address }}</p>
    </div>
</div>
@endsection
