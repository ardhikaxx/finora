@extends('layouts.app')
@section('title', 'Izin - FINORA')
@section('page-title', 'Manajemen Izin')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-key me-2 text-primary"></i>Daftar Izin</span>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Izin
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Izin</th>
                        <th>Deskripsi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-warning-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-key text-warning"></i>
                                </div>
                                <div class="fw-medium">{{ $permission->name }}</div>
                            </div>
                        </td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus izin ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-key d-block mb-2"></i>
                                <p class="mb-0">Tidak ada izin</p>
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
