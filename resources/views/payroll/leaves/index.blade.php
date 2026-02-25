@extends('layouts.app')
@section('title', 'Pengajuan Cuti - FINORA')
@section('page-title', 'Pengajuan Cuti')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-calendar-minus me-2 text-primary"></i>Daftar Pengajuan Cuti</span>
        <a href="{{ route('leaves.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Ajukan Cuti
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal</th>
                        <th class="text-center">Hari</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaveApplications as $leave)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-1 me-2" style="width: 32px; height: 32px;">
                                    <span class="text-primary" style="font-size: 0.7rem;">{{ strtoupper(substr($leave->employee->first_name, 0, 2)) }}</span>
                                </div>
                                <div>{{ $leave->employee->full_name }}</div>
                            </div>
                        </td>
                        <td>{{ $leave->leaveType->name }}</td>
                        <td>{{ $leave->start_date->format('d M') }} - {{ $leave->end_date->format('d M Y') }}</td>
                        <td class="text-center">{{ $leave->total_days }}</td>
                        <td>
                            @if($leave->status === 'approved')
                            <span class="badge badge-custom badge-paid"><i class="fas fa-check-circle me-1"></i>Disetujui</span>
                            @elseif($leave->status === 'rejected')
                            <span class="badge badge-custom badge-overdue"><i class="fas fa-times-circle me-1"></i>Ditolak</span>
                            @else
                            <span class="badge badge-custom badge-pending"><i class="fas fa-clock me-1"></i>Menunggu</span>
                            @endif
                        </td>
                        <td>
                            @if($leave->status === 'pending')
                            <form action="{{ route('leaves.approve', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-icon btn-success" title="Setuju" onclick="return confirm('Apakah Anda menyetujui pengajuan cuti ini?')">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('leaves.show', $leave->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-calendar-minus d-block mb-2"></i>
                                <p class="mb-0">Tidak ada pengajuan cuti</p>
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
