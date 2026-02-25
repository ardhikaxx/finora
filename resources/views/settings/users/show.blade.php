@extends('layouts.app')
@section('title', 'User Details - FINORA')
@section('page-title', 'User Details')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">User: {{ $user->name }}</h5>
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role->name ?? 'No role' }}</p>
        <p><strong>Employee:</strong> {{ $user->employee->full_name ?? 'No employee linked' }}</p>
    </div>
</div>
@endsection
