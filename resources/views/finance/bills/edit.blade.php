@extends('layouts.app')
@section('title', 'Edit Bill - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Edit Bill</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('bills.update', $bill->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="pending" {{ $bill->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $bill->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="overdue" {{ $bill->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('bills.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
