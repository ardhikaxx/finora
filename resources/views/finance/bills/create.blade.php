@extends('layouts.app')
@section('title', 'Create Bill - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Bill</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('bills.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Vendor</label>
                    <select class="form-select" name="vendor_id" required>
                        <option value="">Select Vendor</option>
                        @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bill Number</label>
                    <input type="text" class="form-control" name="bill_number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bill Date</label>
                    <input type="date" class="form-control" name="bill_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="due_date" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" class="form-control" name="total_amount" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('bills.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
