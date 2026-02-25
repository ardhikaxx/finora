<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('payroll.leave-types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('payroll.leave-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:leave_types,name',
            'description' => 'nullable|string',
            'max_days' => 'required|integer|min:0',
        ]);

        LeaveType::create($validated);

        return redirect()->route('leave-types.index')->with('success', 'Leave type created successfully.');
    }

    public function show(LeaveType $leaveType)
    {
        return view('payroll.leave-types.show', compact('leaveType'));
    }

    public function edit(LeaveType $leaveType)
    {
        return view('payroll.leave-types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:leave_types,name,' . $leaveType->id,
            'description' => 'nullable|string',
            'max_days' => 'required|integer|min:0',
        ]);

        $leaveType->update($validated);

        return redirect()->route('leave-types.index')->with('success', 'Leave type updated successfully.');
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return redirect()->route('leave-types.index')->with('success', 'Leave type deleted successfully.');
    }
}
