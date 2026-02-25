@extends('layouts.app')
@section('title', 'Edit Employee - FINORA')
@section('page-title', 'Edit Employee')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Employee</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $employee->job_title) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department_id">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Salary Structure</label>
                    <select class="form-select" name="salary_structure_id">
                        <option value="">Select Salary Structure</option>
                        @foreach($salaryStructures as $structure)
                        <option value="{{ $structure->id }}" {{ $employee->salary_structure_id == $structure->id ? 'selected' : '' }}>{{ $structure->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="terminated" {{ $employee->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Employee</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
