@extends('layouts.app')
@section('title', 'Create Invoice - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Invoice</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('invoices.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Customer</label>
                    <select class="form-select" name="customer_id" required>
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Invoice Number</label>
                    <input type="text" class="form-control" name="invoice_number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Invoice Date</label>
                    <input type="date" class="form-control" name="invoice_date" required>
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
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
