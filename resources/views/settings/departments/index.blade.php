@extends('layouts.app')
@section('title', 'Departemen - FINORA')
@section('page-title', 'Manajemen Departemen')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-building me-2 text-primary"></i>Daftar Departemen</span>
        <a href="{{ route('departments.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Departemen
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Departemen</th>
                        <th>Deskripsi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-building text-primary"></i>
                                </div>
                                <div class="fw-medium">{{ $department->name }}</div>
                            </div>
                        </td>
                        <td>{{ $department->description }}</td>
                        <td>
                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-building d-block mb-2"></i>
                                <p class="mb-0">Tidak ada departemen</p>
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
