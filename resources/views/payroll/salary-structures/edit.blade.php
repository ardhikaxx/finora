@extends('layouts.app')
@section('title', 'Edit Salary Structure - FINORA')
@section('page-title', 'Edit Salary Structure')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Salary Structure</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('salary-structures.update', $salaryStructure->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $salaryStructure->name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Basic Salary</label>
                    <input type="number" class="form-control" name="basic_salary" value="{{ $salaryStructure->basic_salary }}" step="0.01" required>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('salary-structures.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
