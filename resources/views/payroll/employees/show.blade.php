@extends('layouts.app')
@section('title', 'Employee Details - FINORA')
@section('page-title', 'Employee Details')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Employee: {{ $employee->full_name }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Job Title:</strong> {{ $employee->job_title }}</p>
                <p><strong>Department:</strong> {{ $employee->department->name ?? '-' }}</p>
                <p><strong>Hire Date:</strong> {{ $employee->hire_date->format('d M Y') }}</p>
                <p><strong>Status:</strong> {{ $employee->status }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Email:</strong> {{ $employee->user->email ?? '-' }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone_number ?? '-' }}</p>
                <p><strong>Address:</strong> {{ $employee->address ?? '-' }}</p>
                <p><strong>Salary Structure:</strong> {{ $employee->salaryStructure->name ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
