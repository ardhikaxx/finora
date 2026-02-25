@extends('layouts.app')
@section('title', 'Detail Jurnal - FINORA')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-info">
                <i class="fas fa-journal-whills"></i>
            </div>
            <span>Detail Jurnal</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Tanggal</label>
                    <div class="fw-medium">{{ $transaction->transaction_date->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Referensi</label>
                    <div class="fw-medium">{{ $transaction->reference_number ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Deskripsi</label>
                    <div class="fw-medium">{{ $transaction->description }}</div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Akun</th>
                        <th class="text-end">Debit</th>
                        <th class="text-end">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaction->journalEntries as $entry)
                    <tr>
                        <td>{{ $entry->account->account_name }}</td>
                        <td class="text-end">{{ $entry->debit > 0 ? @rupiah($entry->debit) : '-' }}</td>
                        <td class="text-end">{{ $entry->credit > 0 ? @rupiah($entry->credit) : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
