@extends('layouts.app')
@section('title', 'Invoice Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Invoice #{{ $invoice->invoice_number }}</h5></div>
    <div class="card-body">
        <p><strong>Customer:</strong> {{ $invoice->customer->name }}</p>
        <p><strong>Date:</strong> {{ $invoice->invoice_date->format('d M Y') }}</p>
        <p><strong>Due Date:</strong> {{ $invoice->due_date->format('d M Y') }}</p>
        <p><strong>Amount:</strong> ${{ number_format($invoice->total_amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
        @if($invoice->status != 'paid')
        <form action="{{ route('invoices.markPaid', $invoice->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Mark as Paid</button>
        </form>
        @endif
    </div>
</div>
@endsection
