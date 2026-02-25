@extends('layouts.app')
@section('title', 'Edit Invoice - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Edit Invoice</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('invoices.update', $invoice->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Customer</label>
                    <select class="form-select" name="customer_id" required>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Invoice Number</label>
                    <input type="text" class="form-control" name="invoice_number" value="{{ $invoice->invoice_number }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
