@extends('layouts.app')
@section('title', 'Salary Structure Details - FINORA')
@section('page-title', 'Salary Structure Details')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">{{ $salaryStructure->name }}</h5>
    </div>
    <div class="card-body">
        <p><strong>Basic Salary:</strong> ${{ number_format($salaryStructure->basic_salary, 2) }}</p>
        <h6>Components</h6>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaryStructure->components as $component)
                <tr>
                    <td>{{ $component->name }}</td>
                    <td>{{ ucfirst($component->type) }}</td>
                    <td>{{ $component->is_percentage ? $component->amount . '%' : '$' . number_format($component->amount, 2) }}</td>
                </tr>
                @empty
                <tr><td colspan="3">No components</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
