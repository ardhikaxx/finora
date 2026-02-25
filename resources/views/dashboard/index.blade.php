@extends('layouts.app')
@section('title', 'Dashboard - FINORA')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row g-3 g-lg-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card stat-card-primary animate-fade-in animate-delay-1">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-label">Total Karyawan</div>
            <div class="stat-value">{{ $stats['total_employees'] }}</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card stat-card-success animate-fade-in animate-delay-2">
            <div class="stat-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-label">Karyawan Aktif</div>
            <div class="stat-value">{{ $stats['active_employees'] }}</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card stat-card-info animate-fade-in animate-delay-3">
            <div class="stat-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-label">Departemen</div>
            <div class="stat-value">{{ $stats['total_departments'] }}</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card stat-card-warning animate-fade-in animate-delay-4">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-label">Cuti Tertunda</div>
            <div class="stat-value">{{ $stats['pending_leave_applications'] }}</div>
        </div>
    </div>
</div>

<!-- Financial Summary & Recent Payroll -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span>Ringkasan Keuangan</span>
                </div>
                <span class="badge badge-custom badge-processed">Bulan Ini</span>
            </div>
            <div class="card-body p-0">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar avatar-success">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size: 0.8rem;">Total Pendapatan</div>
                                <div class="fw-bold text-success">@rupiah($financialStats['total_revenue'])</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar avatar-danger">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size: 0.8rem;">Total Pengeluaran</div>
                                <div class="fw-bold text-danger">@rupiah($financialStats['total_expenses'])</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar avatar-warning">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size: 0.8rem;">Piutang</div>
                                <div class="fw-bold text-warning">@rupiah($financialStats['accounts_receivable'])</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar avatar-info">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size: 0.8rem;">Hutang</div>
                                <div class="fw-bold text-info">@rupiah($financialStats['accounts_payable'])</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-primary">
                        <i class="fas fa-history"></i>
                    </div>
                    <span>Payroll Terbaru</span>
                </div>
                <a href="{{ route('payrolls.index') }}" class="btn btn-primary-custom btn-sm">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th class="text-end">Gaji Bersih</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPayrolls as $payroll)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-primary">
                                            {{ strtoupper(substr($payroll->employee->first_name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $payroll->employee->full_name }}</div>
                                            <div class="text-muted" style="font-size: 0.7rem;">{{ $payroll->employee->department->name ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end fw-bold">@rupiah($payroll->net_salary)</td>
                                <td>
                                    @if($payroll->status === 'processed')
                                    <span class="badge badge-custom badge-processed">
                                        <i class="fas fa-check"></i> Diproses
                                    </span>
                                    @else
                                    <span class="badge badge-custom badge-pending">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    <div class="empty-state py-2">
                                        <i class="fas fa-inbox mb-2" style="font-size: 2rem;"></i>
                                        <p class="mb-0">Tidak ada payroll terbaru</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Invoices -->
<div class="row">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-primary">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <span>Faktur Terbaru</span>
                </div>
                <a href="{{ route('invoices.index') }}" class="btn btn-primary-custom btn-sm">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>No. Faktur</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Jatuh Tempo</th>
                                <th class="text-end">Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentInvoices as $invoice)
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
                                        <i class="fas fa-check"></i> Lunas
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
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="empty-state py-2">
                                        <i class="fas fa-inbox mb-2" style="font-size: 2rem;"></i>
                                        <p class="mb-0">Tidak ada faktur terbaru</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
