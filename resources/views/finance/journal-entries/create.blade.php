@extends('layouts.app')
@section('title', 'Create Journal Entry - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Journal Entry</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('journal-entries.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="transaction_date" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Reference</label>
                    <input type="text" class="form-control" name="reference_number">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="2"></textarea>
            </div>
            <h6>Entries</h6>
            <div id="entries-wrapper">
                <div class="row mb-2">
                    <div class="col-md-5">
                        <select class="form-select" name="entries[0][account_id]">
                            <option value="">Select Account</option>
                            @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_number }} - {{ $account->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="entries[0][debit]" placeholder="Debit" step="0.01">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="entries[0][credit]" placeholder="Credit" step="0.01">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mb-3" onclick="addEntry()">+ Add Row</button>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('journal-entries.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
let entryCount = 1;
function addEntry() {
    const html = `<div class="row mb-2">
        <div class="col-md-5">
            <select class="form-select" name="entries[${entryCount}][account_id]">
                <option value="">Select Account</option>
                @foreach($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->account_number }} - {{ $account->account_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="entries[${entryCount}][debit]" placeholder="Debit" step="0.01">
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="entries[${entryCount}][credit]" placeholder="Credit" step="0.01">
        </div>
    </div>`;
    document.getElementById('entries-wrapper').insertAdjacentHTML('beforeend', html);
    entryCount++;
}
</script>
@endsection
