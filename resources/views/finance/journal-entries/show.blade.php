@extends('layouts.app')
@section('title', 'Journal Entry Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Journal Entry</h5></div>
    <div class="card-body">
        <p><strong>Date:</strong> {{ $transaction->transaction_date->format('d M Y') }}</p>
        <p><strong>Reference:</strong> {{ $transaction->reference_number ?? '-' }}</p>
        <p><strong>Description:</strong> {{ $transaction->description }}</p>
        <table class="table table-sm">
            <thead><tr><th>Account</th><th>Debit</th><th>Credit</th></tr></thead>
            <tbody>
                @foreach($transaction->journalEntries as $entry)
                <tr>
                    <td>{{ $entry->account->account_name }}</td>
                    <td>{{ $entry->debit > 0 ? '$'.number_format($entry->debit, 2) : '-' }}</td>
                    <td>{{ $entry->credit > 0 ? '$'.number_format($entry->credit, 2) : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
