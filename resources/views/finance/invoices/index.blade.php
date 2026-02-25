@extends('layouts.app')
@section('title', 'Faktur - FINORA')
@section('page-title', 'Piutang Usaha')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-file-invoice"></i>
            </div>
            <span>Daftar Faktur</span>
        </div>
        <a href="{{ route('invoices.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Nomor Faktur</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Jatuh Tempo</th>
                        <th class="text-end">Jumlah</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                    <tr>
                        <td class="fw-medium">{{ $invoice->invoice_number }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar avatar-warning">
                                    {{ strtoupper(substr($invoice->customer->name, 0, 2)) }}
                                </div>
                                {{ $invoice->customer->name }}
                            </div>
                        </td>
                        <td>{{ $invoice->invoice_date->format('d M Y') }}</td>
                        <td>{{ $invoice->due_date->format('d M Y') }}</td>
                        <td class="text-end fw-bold">@rupiah($invoice->total_amount)</td>
                        <td>
                            @if($invoice->status === 'paid')
                            <span class="badge badge-custom badge-paid">
                                <i class="fas fa-check-circle"></i> Lunas
                            </span>
                            @elseif($invoice->status === 'pending')
                            <span class="badge badge-custom badge-pending">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                            @else
                            <span class="badge badge-custom badge-overdue">
                                <i class="fas fa-exclamation-triangle"></i> Jatuh Tempo
                            </span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-icon btn-info" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-icon btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-file-invoice mb-2"></i>
                                <p class="mb-0">Tidak ada faktur</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
