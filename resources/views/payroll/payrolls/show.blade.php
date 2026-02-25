@extends('layouts.app')
@section('title', 'Payroll Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Payroll Details</h5></div>
    <div class="card-body">
        <p><strong>Employee:</strong> {{ $payroll->employee->full_name }}</p>
        <p><strong>Period:</strong> {{ $payroll->pay_period_start->format('d M Y') }} - {{ $payroll->pay_period_end->format('d M Y') }}</p>
        <p><strong>Gross Salary:</strong> ${{ number_format($payroll->gross_salary, 2) }}</p>
        <p><strong>Deductions:</strong> ${{ number_format($payroll->total_deductions, 2) }}</p>
        <p><strong>Net Salary:</strong> ${{ number_format($payroll->net_salary, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($payroll->status) }}</p>
        <p><strong>Processed By:</strong> {{ $payroll->processor->name ?? '-' }}</p>
    </div>
</div>
@endsection
