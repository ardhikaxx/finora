@extends('layouts.app')
@section('title', 'Karyawan - FINORA')
@section('page-title', 'Manajemen Karyawan')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="form-control form-control-custom" placeholder="Cari karyawan...">
        </div>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('employees.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus-circle"></i> Tambah Karyawan
        </a>
    </div>
</div>

<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-users"></i>
            </div>
            <span>Daftar Karyawan</span>
        </div>
        <span class="badge badge-custom badge-processed">{{ $employees->count() }} Karyawan</span>
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
                    <tr class="animate-fade-in" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar {{ $employee->status === 'active' ? 'avatar-success' : 'avatar-warning' }}">
                                    {{ strtoupper(substr($employee->first_name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $employee->full_name }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ $employee->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-medium">{{ $employee->job_title }}</div>
                        </td>
                        <td>
                            <span class="badge badge-custom badge-processed">{{ $employee->department->name ?? '-' }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-calendar text-muted" style="font-size: 0.8rem;"></i>
                                {{ $employee->hire_date->format('d M Y') }}
                            </div>
                        </td>
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
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-icon btn-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-icon btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fas fa-user-tie mb-3" style="font-size: 3.5rem;"></i>
                                <h5 class="fw-semibold">Belum Ada Karyawan</h5>
                                <p class="text-muted mb-3">Silakan tambah karyawan terlebih dahulu</p>
                                <a href="{{ route('employees.create') }}" class="btn btn-primary-custom">
                                    <i class="fas fa-plus"></i> Tambah Karyawan
                                </a>
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
