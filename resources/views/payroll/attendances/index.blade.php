@extends('layouts.app')
@section('title', 'Absensi - FINORA')
@section('page-title', 'Manajemen Absensi')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-clock me-2 text-primary"></i>Daftar Absensi</span>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Rekam Absensi
        </a>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <select class="form-control form-control-custom" name="employee_id">
                        <option value="">Semua Karyawan</option>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary-custom w-100">
                        <i class="fas fa-filter me-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-1 me-2" style="width: 32px; height: 32px;">
                                    <span class="text-primary" style="font-size: 0.7rem;">{{ strtoupper(substr($attendance->employee->first_name, 0, 2)) }}</span>
                                </div>
                                <div>{{ $attendance->employee->full_name }}</div>
                            </div>
                        </td>
                        <td>{{ $attendance->date->format('d M Y') }}</td>
                        <td>{{ $attendance->check_in_time ? $attendance->check_in_time->format('H:i') : '-' }}</td>
                        <td>{{ $attendance->check_out_time ? $attendance->check_out_time->format('H:i') : '-' }}</td>
                        <td>
                            @if($attendance->status === 'present')
                            <span class="badge badge-custom badge-active"><i class="fas fa-check-circle me-1"></i>Hadir</span>
                            @elseif($attendance->status === 'absent')
                            <span class="badge badge-custom badge-overdue"><i class="fas fa-times-circle me-1"></i>Absen</span>
                            @elseif($attendance->status === 'late')
                            <span class="badge badge-custom badge-pending"><i class="fas fa-clock me-1"></i>Terlambat</span>
                            @else
                            <span class="badge badge-custom badge-processed">{{ ucfirst($attendance->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-clock d-block mb-2"></i>
                                <p class="mb-0">Tidak ada data absensi</p>
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
