@extends('layouts.app')
@section('title', 'Create Customer - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Customer</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
