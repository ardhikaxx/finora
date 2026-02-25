@extends('layouts.app')
@section('title', 'Create Employee - FINORA')
@section('page-title', 'Create Employee')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Create New Employee</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hire Date</label>
                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date" value="{{ old('hire_date') }}" required>
                    @error('hire_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="2">{{ old('address') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required>
                    @error('job_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department_id">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                        <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Employee</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
