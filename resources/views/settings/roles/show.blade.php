@extends('layouts.app')
@section('title', 'Role Details - FINORA')
@section('page-title', 'Role Details')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Role: {{ $role->name }}</h5>
        <div>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Description</h6>
                <p>{{ $role->description ?? 'No description' }}</p>
            </div>
        </div>
        <h6 class="mt-4">Permissions</h6>
        <div class="d-flex flex-wrap gap-2">
            @forelse($role->permissions as $permission)
            <span class="badge bg-primary">{{ $permission->name }}</span>
            @empty
            <span class="text-muted">No permissions assigned</span>
            @endforelse
        </div>
    </div>
</div>
@endsection
