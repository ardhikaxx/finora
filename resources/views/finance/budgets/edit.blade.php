@extends('layouts.app')
@section('title', 'Edit Budget - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Edit Budget</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('budgets.update', $budget->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $budget->name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Total Amount</label>
                    <input type="number" class="form-control" name="total_amount" value="{{ $budget->total_amount }}" step="0.01" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{ $budget->start_date }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" value="{{ $budget->end_date }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('budgets.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
