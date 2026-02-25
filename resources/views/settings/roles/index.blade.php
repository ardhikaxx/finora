@extends('layouts.app')
@section('title', 'Peran - FINORA')
@section('page-title', 'Manajemen Peran')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-user-shield me-2 text-primary"></i>Daftar Peran</span>
        <a href="{{ route('roles.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Peran
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Peran</th>
                        <th>Deskripsi</th>
                        <th>Izin</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user-shield text-primary"></i>
                                </div>
                                <div class="fw-medium">{{ $role->name }}</div>
                            </div>
                        </td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @foreach($role->permissions->take(3) as $permission)
                            <span class="badge badge-custom badge-processed">{{ $permission->name }}</span>
                            @endforeach
                            @if($role->permissions->count() > 3)
                            <span class="badge badge-custom badge-pending">+{{ $role->permissions->count() - 3 }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-user-shield d-block mb-2"></i>
                                <p class="mb-0">Tidak ada peran</p>
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
