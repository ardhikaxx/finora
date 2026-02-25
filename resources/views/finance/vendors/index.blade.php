@extends('layouts.app')
@section('title', 'Vendor - FINORA')
@section('page-title', 'Manajemen Vendor')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-truck me-2 text-primary"></i>Daftar Vendor</span>
        <a href="{{ route('vendors.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Vendor
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Vendor</th>
                        <th>Kontak</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vendors as $vendor)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-warning-subtle rounded-circle p-2 me-3" style="width: 40px; height: 40px;">
                                    <span class="text-warning fw-bold">{{ strtoupper(substr($vendor->name, 0, 2)) }}</span>
                                </div>
                                <div class="fw-medium">{{ $vendor->name }}</div>
                            </div>
                        </td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->phone }}</td>
                        <td>{{ $vendor->address }}</td>
                        <td>
                            <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-truck d-block mb-2"></i>
                                <p class="mb-0">Tidak ada vendor</p>
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
