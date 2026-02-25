@extends('layouts.app')
@section('title', 'Create Account - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Create Account</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Account Number</label>
                <input type="text" class="form-control" name="account_number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Account Name</label>
                <input type="text" class="form-control" name="account_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Account Type</label>
                <select class="form-select" name="account_type" required>
                    <option value="asset">Asset</option>
                    <option value="liability">Liability</option>
                    <option value="equity">Equity</option>
                    <option value="revenue">Revenue</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Parent Account</label>
                <select class="form-select" name="parent_account_id">
                    <option value="">None</option>
                    @foreach($parentAccounts as $account)
                    <option value="{{ $account->id }}">{{ $account->account_number }} - {{ $account->account_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
