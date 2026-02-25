@extends('layouts.app')
@section('title', 'Leave Details - FINORA')
@section('page-title', 'Leave Details')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Leave Application</h5>
    </div>
    <div class="card-body">
        <p><strong>Employee:</strong> {{ $leaveApplication->employee->full_name }}</p>
        <p><strong>Type:</strong> {{ $leaveApplication->leaveType->name }}</p>
        <p><strong>Period:</strong> {{ $leaveApplication->start_date->format('d M Y') }} - {{ $leaveApplication->end_date->format('d M Y') }}</p>
        <p><strong>Days:</strong> {{ $leaveApplication->total_days }}</p>
        <p><strong>Reason:</strong> {{ $leaveApplication->reason }}</p>
        <p><strong>Status:</strong> {{ ucfirst($leaveApplication->status) }}</p>
    </div>
</div>
@endsection
