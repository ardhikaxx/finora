@extends('layouts.app')
@section('title', 'Edit Attendance - FINORA')
@section('page-title', 'Edit Attendance')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Attendance</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('attendances.update', $attendance->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee</label>
                    <select class="form-select" name="employee_id" required>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" {{ $attendance->employee_id == $emp->id ? 'selected' : '' }}>{{ $emp->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ $attendance->date }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                    <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                    <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>Late</option>
                    <option value="leave" {{ $attendance->status == 'leave' ? 'selected' : '' }}>Leave</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
