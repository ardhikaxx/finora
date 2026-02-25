<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department', 'salaryStructure')->get();
        return view('payroll.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $salaryStructures = SalaryStructure::all();
        return view('payroll.employees.create', compact('departments', 'salaryStructures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'hire_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'salary_structure_id' => 'nullable|exists:salary_structures,id',
            'status' => 'required|string|in:active,inactive,terminated',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load('department', 'salaryStructure', 'salaryStructure.components', 'user');
        return view('payroll.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $salaryStructures = SalaryStructure::all();
        return view('payroll.employees.edit', compact('employee', 'departments', 'salaryStructures'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'hire_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'salary_structure_id' => 'nullable|exists:salary_structures,id',
            'status' => 'required|string|in:active,inactive,terminated',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
