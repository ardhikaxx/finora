@extends('layouts.app')
@section('title', 'Create Leave Type - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Leave Type</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('leave-types.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Max Days</label>
                <input type="number" class="form-control" name="max_days" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('leave-types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
