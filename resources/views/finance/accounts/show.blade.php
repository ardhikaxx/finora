@extends('layouts.app')
@section('title', 'Account Details - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">{{ $account->account_name }}</h5></div>
    <div class="card-body">
        <p><strong>Account Number:</strong> {{ $account->account_number }}</p>
        <p><strong>Type:</strong> {{ ucfirst($account->account_type) }}</p>
        <p><strong>Parent:</strong> {{ $account->parentAccount->account_name ?? 'None' }}</p>
    </div>
</div>
@endsection
