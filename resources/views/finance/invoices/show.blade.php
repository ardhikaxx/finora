@extends('layouts.app')
@section('title', 'Detail Faktur - FINORA')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-warning">
                <i class="fas fa-file-invoice"></i>
            </div>
            <span>Faktur #{{ $invoice->invoice_number }}</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Pelanggan</label>
                    <div class="fw-medium">{{ $invoice->customer->name }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Jumlah</label>
                    <div class="fw-bold text-primary" style="font-size: 1.25rem;">@rupiah($invoice->total_amount)</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Tanggal</label>
                    <div class="fw-medium">{{ $invoice->invoice_date->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Jatuh Tempo</label>
                    <div class="fw-medium">{{ $invoice->due_date->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Status</label>
                    <div>
                        @if($invoice->status === 'paid')
                        <span class="badge badge-custom badge-paid"><i class="fas fa-check-circle"></i> Lunas</span>
                        @elseif($invoice->status === 'pending')
                        <span class="badge badge-custom badge-pending"><i class="fas fa-clock"></i> Menunggu</span>
                        @else
                        <span class="badge badge-custom badge-overdue"><i class="fas fa-exclamation-triangle"></i> Jatuh Tempo</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($invoice->status != 'paid')
        <form action="{{ route('invoices.markPaid', $invoice->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary-custom mt-3">
                <i class="fas fa-check"></i> Tandai Lunas
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
