@extends('layouts.app')
@section('title', 'Edit Account - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Edit Account</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.update', $account->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Account Number</label>
                <input type="text" class="form-control" name="account_number" value="{{ $account->account_number }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Account Name</label>
                <input type="text" class="form-control" name="account_name" value="{{ $account->account_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Account Type</label>
                <select class="form-select" name="account_type" required>
                    <option value="asset" {{ $account->account_type == 'asset' ? 'selected' : '' }}>Asset</option>
                    <option value="liability" {{ $account->account_type == 'liability' ? 'selected' : '' }}>Liability</option>
                    <option value="equity" {{ $account->account_type == 'equity' ? 'selected' : '' }}>Equity</option>
                    <option value="revenue" {{ $account->account_type == 'revenue' ? 'selected' : '' }}>Revenue</option>
                    <option value="expense" {{ $account->account_type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
