@extends('layouts.app')
@section('title', 'Pelanggan - FINORA')
@section('page-title', 'Manajemen Pelanggan')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-user-friends me-2 text-primary"></i>Daftar Pelanggan</span>
        <a href="{{ route('customers.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Pelanggan
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Kontak</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-2 me-3" style="width: 40px; height: 40px;">
                                    <span class="text-primary fw-bold">{{ strtoupper(substr($customer->name, 0, 2)) }}</span>
                                </div>
                                <div class="fw-medium">{{ $customer->name }}</div>
                            </div>
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-user-friends d-block mb-2"></i>
                                <p class="mb-0">Tidak ada pelanggan</p>
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
