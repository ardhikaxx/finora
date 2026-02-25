@extends('layouts.app')
@section('title', 'Detail Anggaran - FINORA')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-success">
                <i class="fas fa-chart-pie"></i>
            </div>
            <span>{{ $budget->name }}</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Periode</label>
                    <div class="fw-medium">{{ $budget->start_date->format('d M Y') }} - {{ $budget->end_date->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Total Anggaran</label>
                    <div class="fw-bold text-primary" style="font-size: 1.25rem;">@rupiah($budget->total_amount)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Dialokasikan</label>
                    <div class="fw-bold text-success">@rupiah($budget->allocated_total)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Sisa</label>
                    <div class="fw-bold text-warning">@rupiah($budget->remaining)</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
