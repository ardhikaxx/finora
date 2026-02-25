@extends('layouts.app')
@section('title', 'Bill Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Bill #{{ $bill->bill_number }}</h5></div>
    <div class="card-body">
        <p><strong>Vendor:</strong> {{ $bill->vendor->name }}</p>
        <p><strong>Date:</strong> {{ $bill->bill_date->format('d M Y') }}</p>
        <p><strong>Due Date:</strong> {{ $bill->due_date->format('d M Y') }}</p>
        <p><strong>Amount:</strong> ${{ number_format($bill->total_amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($bill->status) }}</p>
        @if($bill->status != 'paid')
        <form action="{{ route('bills.markPaid', $bill->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Mark as Paid</button>
        </form>
        @endif
    </div>
</div>
@endsection
