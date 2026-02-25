@extends('layouts.app')
@section('title', 'Payroll - FINORA')
@section('page-title', 'Manajemen Payroll')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-invoice-dollar me-2 text-primary"></i>Daftar Payroll</span>
        <a href="{{ route('payrolls.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Proses Payroll
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Periode</th>
                        <th class="text-end">Gaji Kotor</th>
                        <th class="text-end">Potongan</th>
                        <th class="text-end">Gaji Bersih</th>
                        <th>Status</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payrolls as $payroll)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-1 me-2" style="width: 32px; height: 32px;">
                                    <span class="text-primary" style="font-size: 0.7rem;">{{ strtoupper(substr($payroll->employee->first_name, 0, 2)) }}</span>
                                </div>
                                <div>
                                    <div class="fw-medium">{{ $payroll->employee->full_name }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ $payroll->employee->department->name ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $payroll->pay_period_start->format('d M') }} - {{ $payroll->pay_period_end->format('d M Y') }}</td>
                        <td class="text-end">@rupiah($payroll->gross_salary)</td>
                        <td class="text-end text-danger">@rupiah($payroll->total_deductions)</td>
                        <td class="text-end fw-bold">@rupiah($payroll->net_salary)</td>
                        <td>
                            @if($payroll->status === 'processed')
                            <span class="badge badge-custom badge-processed"><i class="fas fa-check-circle me-1"></i>Diproses</span>
                            @elseif($payroll->status === 'pending')
                            <span class="badge badge-custom badge-pending"><i class="fas fa-clock me-1"></i>Pending</span>
                            @else
                            <span class="badge badge-custom badge-paid"><i class="fas fa-check-double me-1"></i>Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('payrolls.show', $payroll->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-file-invoice-dollar d-block mb-2"></i>
                                <p class="mb-0">Tidak ada data payroll</p>
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
