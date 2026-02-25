@extends('layouts.app')
@section('title', 'Create Salary Structure - FINORA')
@section('page-title', 'Create Salary Structure')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Create Salary Structure</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('salary-structures.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Basic Salary</label>
                    <input type="number" class="form-control" name="basic_salary" step="0.01" required>
                </div>
            </div>
            <h6>Components</h6>
            <div id="components-wrapper">
                <div class="row component-row mb-2">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="components[0][name]" placeholder="Component Name">
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" name="components[0][type]">
                            <option value="allowance">Allowance</option>
                            <option value="deduction">Deduction</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="components[0][amount]" placeholder="Amount" step="0.01">
                    </div>
                    <div class="col-md-2">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="components[0][is_percentage]" value="1">
                            <label class="form-check-label">%</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mb-3" onclick="addComponent()">+ Add Component</button>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('salary-structures.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
let componentCount = 1;
function addComponent() {
    const html = `<div class="row component-row mb-2">
        <div class="col-md-3">
            <input type="text" class="form-control" name="components[${componentCount}][name]" placeholder="Component Name">
        </div>
        <div class="col-md-2">
            <select class="form-select" name="components[${componentCount}][type]">
                <option value="allowance">Allowance</option>
                <option value="deduction">Deduction</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="components[${componentCount}][amount]" placeholder="Amount" step="0.01">
        </div>
        <div class="col-md-2">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="components[${componentCount}][is_percentage]" value="1">
                <label class="form-check-label">%</label>
            </div>
        </div>
    </div>`;
    document.getElementById('components-wrapper').insertAdjacentHTML('beforeend', html);
    componentCount++;
}
</script>
@endsection
