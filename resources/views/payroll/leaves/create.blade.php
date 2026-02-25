@extends('layouts.app')
@section('title', 'Apply Leave - FINORA')
@section('page-title', 'Apply Leave')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Apply Leave</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('leaves.store') }}">
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
                <div class="col-md-6 mb-3">
                    <label class="form-label">Leave Type</label>
                    <select class="form-select" name="leave_type_id" required>
                        <option value="">Select Type</option>
                        @foreach($leaveTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }} ({{ $type->max_days }} days)</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Reason</label>
                <textarea class="form-control" name="reason" rows="3"></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
