@extends('layouts.app')
@section('title', 'Create Permission - FINORA')
@section('page-title', 'Create Permission')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Create New Permission</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
