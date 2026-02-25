<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\LeaveType;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveApplication::with('employee', 'leaveType');

        if ($request->employee_id) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $leaveApplications = $query->orderBy('created_at', 'desc')->get();
        $leaveTypes = LeaveType::all();
        $employees = Employee::where('status', 'active')->get();

        return view('payroll.leaves.index', compact('leaveApplications', 'leaveTypes', 'employees'));
    }

    public function create()
    {
        $leaveTypes = LeaveType::all();
        $employees = Employee::where('status', 'active')->get();
        return view('payroll.leaves.create', compact('leaveTypes', 'employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        LeaveApplication::create($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave application submitted successfully.');
    }

    public function show(LeaveApplication $leaveApplication)
    {
        $leaveApplication->load('employee', 'leaveType', 'approver');
        return view('payroll.leaves.show', compact('leaveApplication'));
    }

    public function approve(LeaveApplication $leaveApplication)
    {
        $leaveApplication->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave application approved.');
    }

    public function reject(Request $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave application rejected.');
    }

    public function destroy(LeaveApplication $leaveApplication)
    {
        $leaveApplication->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave application deleted successfully.');
    }
}
