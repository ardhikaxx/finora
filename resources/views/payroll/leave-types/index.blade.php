@extends('layouts.app')
@section('title', 'Jenis Cuti - FINORA')
@section('page-title', 'Jenis Cuti')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-calendar-alt me-2 text-primary"></i>Daftar Jenis Cuti</span>
        <a href="{{ route('leave-types.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Jenis Cuti
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Jenis Cuti</th>
                        <th class="text-center">Hari Maksimum</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaveTypes as $type)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-info-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-calendar-alt text-info"></i>
                                </div>
                                <div class="fw-medium">{{ $type->name }}</div>
                            </div>
                        </td>
                        <td class="text-center">{{ $type->max_days }} hari</td>
                        <td>
                            <a href="{{ route('leave-types.edit', $type->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('leave-types.destroy', $type->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis cuti ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-calendar-alt d-block mb-2"></i>
                                <p class="mb-0">Tidak ada jenis cuti</p>
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
