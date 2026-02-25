@extends('layouts.app')
@section('title', 'Process Payroll - FINORA')

@section('content')
<div class="card">
    <div class="card-header bg-white"><h5 class="mb-0">Process Payroll</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('payrolls.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee</label>
                    <select class="form-select" name="employee_id" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pay Period Start</label>
                    <input type="date" class="form-control" name="pay_period_start" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pay Period End</label>
                    <input type="date" class="form-control" name="pay_period_end" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Process</button>
            <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
