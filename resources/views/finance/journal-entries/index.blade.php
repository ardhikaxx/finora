@extends('layouts.app')
@section('title', 'Jurnal Umum - FINORA')
@section('page-title', 'Jurnal Umum')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-journal-whills me-2 text-primary"></i>Daftar Jurnal</span>
        <a href="{{ route('journal-entries.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Buat Jurnal
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Referensi</th>
                        <th>Deskripsi</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_date->format('d M Y') }}</td>
                        <td class="fw-medium">{{ $transaction->reference_number ?? '-' }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>
                            <a href="{{ route('journal-entries.show', $transaction->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-journal-whills d-block mb-2"></i>
                                <p class="mb-0">Tidak ada jurnal</p>
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
