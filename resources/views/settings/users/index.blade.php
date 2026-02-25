@extends('layouts.app')
@section('title', 'Pengguna - FINORA')
@section('page-title', 'Manajemen Pengguna')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-users"></i>
            </div>
            <span>Daftar Pengguna</span>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Karyawan</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar avatar-primary">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div class="fw-medium">{{ $user->name }}</div>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role)
                            <span class="badge badge-custom badge-active">{{ $user->role->name }}</span>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $user->employee->full_name ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-icon btn-info" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-icon btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-users mb-2"></i>
                                <p class="mb-0">Tidak ada pengguna</p>
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
