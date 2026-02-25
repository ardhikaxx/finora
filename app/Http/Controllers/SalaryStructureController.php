<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use App\Models\SalaryComponent;
use Illuminate\Http\Request;

class SalaryStructureController extends Controller
{
    public function index()
    {
        $salaryStructures = SalaryStructure::with('components')->get();
        return view('payroll.salary-structures.index', compact('salaryStructures'));
    }

    public function create()
    {
        return view('payroll.salary-structures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'basic_salary' => 'required|numeric|min:0',
        ]);

        $salaryStructure = SalaryStructure::create($validated);

        if ($request->has('components')) {
            foreach ($request->components as $component) {
                if (!empty($component['name'])) {
                    SalaryComponent::create([
                        'salary_structure_id' => $salaryStructure->id,
                        'name' => $component['name'],
                        'type' => $component['type'],
                        'amount' => $component['amount'],
                        'is_percentage' => $component['is_percentage'] ?? false,
                    ]);
                }
            }
        }

        return redirect()->route('salary-structures.index')->with('success', 'Salary structure created successfully.');
    }

    public function show(SalaryStructure $salaryStructure)
    {
        $salaryStructure->load('components', 'employees');
        return view('payroll.salary-structures.show', compact('salaryStructure'));
    }

    public function edit(SalaryStructure $salaryStructure)
    {
        $salaryStructure->load('components');
        return view('payroll.salary-structures.edit', compact('salaryStructure'));
    }

    public function update(Request $request, SalaryStructure $salaryStructure)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'basic_salary' => 'required|numeric|min:0',
        ]);

        $salaryStructure->update($validated);

        if ($request->has('components')) {
            $salaryStructure->components()->delete();
            foreach ($request->components as $component) {
                if (!empty($component['name'])) {
                    SalaryComponent::create([
                        'salary_structure_id' => $salaryStructure->id,
                        'name' => $component['name'],
                        'type' => $component['type'],
                        'amount' => $component['amount'],
                        'is_percentage' => $component['is_percentage'] ?? false,
                    ]);
                }
            }
        }

        return redirect()->route('salary-structures.index')->with('success', 'Salary structure updated successfully.');
    }

    public function destroy(SalaryStructure $salaryStructure)
    {
        $salaryStructure->delete();
        return redirect()->route('salary-structures.index')->with('success', 'Salary structure deleted successfully.');
    }
}
