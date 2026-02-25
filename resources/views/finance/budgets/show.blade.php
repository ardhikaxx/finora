@extends('layouts.app')
@section('title', 'Budget Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">{{ $budget->name }}</h5></div>
    <div class="card-body">
        <p><strong>Period:</strong> {{ $budget->start_date->format('d M Y') }} - {{ $budget->end_date->format('d M Y') }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($budget->total_amount, 2) }}</p>
        <p><strong>Allocated:</strong> ${{ number_format($budget->allocated_total, 2) }}</p>
        <p><strong>Remaining:</strong> ${{ number_format($budget->remaining, 2) }}</p>
    </div>
</div>
@endsection
