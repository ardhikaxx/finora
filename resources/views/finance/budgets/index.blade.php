@extends('layouts.app')
@section('title', 'Anggaran - FINORA')
@section('page-title', 'Manajemen Anggaran')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-chart-pie me-2 text-primary"></i>Daftar Anggaran</span>
        <a href="{{ route('budgets.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Anggaran
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Anggaran</th>
                        <th>Periode</th>
                        <th class="text-end">Total Anggaran</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($budgets as $budget)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-success-subtle rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-chart-pie text-success"></i>
                                </div>
                                <div class="fw-medium">{{ $budget->name }}</div>
                            </div>
                        </td>
                        <td>{{ $budget->start_date->format('d M Y') }} - {{ $budget->end_date->format('d M Y') }}</td>
                        <td class="text-end fw-bold">@rupiah($budget->total_amount)</td>
                        <td>
                            <a href="{{ route('budgets.show', $budget->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('budgets.edit', $budget->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-chart-pie d-block mb-2"></i>
                                <p class="mb-0">Tidak ada anggaran</p>
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
