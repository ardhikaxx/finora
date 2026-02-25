@extends('layouts.app')
@section('title', 'Edit Customer - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Edit Customer</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="2">{{ $customer->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
