@extends('layouts.app')
@section('title', 'Karyawan - FINORA')
@section('page-title', 'Manajemen Karyawan')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-user-tie"></i>
            </div>
            <span>Daftar Karyawan</span>
        </div>
        <a href="{{ route('employees.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar {{ $employee->status === 'active' ? 'avatar-success' : 'avatar-warning' }}">
                                    {{ strtoupper(substr($employee->first_name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="fw-medium">{{ $employee->full_name }}</div>
                                    <div class="text-muted" style="font-size: 0.7rem;">{{ $employee->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $employee->job_title }}</td>
                        <td>{{ $employee->department->name ?? '-' }}</td>
                        <td>{{ $employee->hire_date->format('d M Y') }}</td>
                        <td>
                            @if($employee->status === 'active')
                            <span class="badge badge-custom badge-active">
                                <i class="fas fa-check-circle"></i> Aktif
                            </span>
                            @elseif($employee->status === 'inactive')
                            <span class="badge badge-custom badge-pending">
                                <i class="fas fa-clock"></i> Nonaktif
                            </span>
                            @else
                            <span class="badge badge-custom badge-overdue">
                                <i class="fas fa-times-circle"></i> Berhenti
                            </span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-icon btn-info" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-icon btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-user-tie mb-2"></i>
                                <p class="mb-0">Tidak ada karyawan</p>
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
