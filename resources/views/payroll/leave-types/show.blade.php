@extends('layouts.app')
@section('title', 'Leave Type Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">{{ $leaveType->name }}</h5></div>
    <div class="card-body">
        <p><strong>Description:</strong> {{ $leaveType->description }}</p>
        <p><strong>Max Days:</strong> {{ $leaveType->max_days }}</p>
    </div>
</div>
@endsection
