@extends('layouts.app')
@section('title', 'Edit Permission - FINORA')
@section('page-title', 'Edit Permission')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Permission</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $permission->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $permission->description) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
