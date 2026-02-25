@extends('layouts.app')
@section('title', 'Detail Payroll - FINORA')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <span>Detail Payroll</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Karyawan</label>
                    <div class="fw-medium">{{ $payroll->employee->full_name }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Periode</label>
                    <div class="fw-medium">{{ $payroll->pay_period_start->format('d M Y') }} - {{ $payroll->pay_period_end->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Gaji Kotor</label>
                    <div class="fw-bold text-primary">@rupiah($payroll->gross_salary)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Potongan</label>
                    <div class="fw-bold text-danger">@rupiah($payroll->total_deductions)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Gaji Bersih</label>
                    <div class="fw-bold text-success" style="font-size: 1.25rem;">@rupiah($payroll->net_salary)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Status</label>
                    <div>
                        @if($payroll->status === 'processed')
                        <span class="badge badge-custom badge-processed"><i class="fas fa-check"></i> Diproses</span>
                        @elseif($payroll->status === 'pending')
                        <span class="badge badge-custom badge-pending"><i class="fas fa-clock"></i> Pending</span>
                        @else
                        <span class="badge badge-custom badge-paid"><i class="fas fa-check-double"></i> Completed</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Diproses Oleh</label>
                    <div class="fw-medium">{{ $payroll->processor->name ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
