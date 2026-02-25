@extends('layouts.app')
@section('title', 'Department Details - FINORA')
@section('page-title', 'Department Details')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Department: {{ $department->name }}</h5>
    </div>
    <div class="card-body">
        <p><strong>Description:</strong> {{ $department->description ?? 'No description' }}</p>
        <p><strong>Employees:</strong> {{ $department->employees->count() }}</p>
    </div>
</div>
@endsection
