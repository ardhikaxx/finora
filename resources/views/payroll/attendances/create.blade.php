@extends('layouts.app')
@section('title', 'Record Attendance - FINORA')
@section('page-title', 'Record Attendance')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Record Attendance</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('attendances.store') }}">
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
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Check In Time</label>
                    <input type="time" class="form-control" name="check_in_time">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Check Out Time</label>
                    <input type="time" class="form-control" name="check_out_time">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                    <option value="leave">Leave</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
