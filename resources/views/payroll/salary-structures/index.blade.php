@extends('layouts.app')
@section('title', 'Struktur Gaji - FINORA')
@section('page-title', 'Struktur Gaji')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-money-bill-wave me-2 text-primary"></i>Daftar Struktur Gaji</span>
        <a href="{{ route('salary-structures.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Struktur
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Struktur Gaji</th>
                        <th class="text-end">Gaji Pokok</th>
                        <th class="text-center">Komponen</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaryStructures as $structure)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-success-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-money-bill-wave text-success"></i>
                                </div>
                                <div class="fw-medium">{{ $structure->name }}</div>
                            </div>
                        </td>
                        <td class="text-end fw-bold">@rupiah($structure->basic_salary)</td>
                        <td class="text-center">
                            <span class="badge badge-custom badge-processed">{{ $structure->components->count() }} komponen</span>
                        </td>
                        <td>
                            <a href="{{ route('salary-structures.show', $structure->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('salary-structures.edit', $structure->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('salary-structures.destroy', $structure->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus struktur gaji ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-money-bill-wave d-block mb-2"></i>
                                <p class="mb-0">Tidak ada struktur gaji</p>
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
