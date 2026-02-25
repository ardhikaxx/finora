<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use App\Models\SalaryStructure;
use App\Models\SalaryComponent;
use App\Models\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $query = Payroll::with('employee');

        if ($request->employee_id) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $payrolls = $query->orderBy('created_at', 'desc')->get();
        $employees = Employee::where('status', 'active')->get();

        return view('payroll.payrolls.index', compact('payrolls', 'employees'));
    }

    public function create()
    {
        $employees = Employee::with('salaryStructure', 'salaryStructure.components')
            ->where('status', 'active')
            ->whereNotNull('salary_structure_id')
            ->get();

        return view('payroll.payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'pay_period_start' => 'required|date',
            'pay_period_end' => 'required|date|after_or_equal:pay_period_start',
        ]);

        $employee = Employee::with('salaryStructure', 'salaryStructure.components')->findOrFail($validated['employee_id']);
        $salaryStructure = $employee->salaryStructure;

        if (!$salaryStructure) {
            return back()->with('error', 'Employee does not have a salary structure assigned.');
        }

        $basicSalary = $salaryStructure->basic_salary;
        $allowances = 0;
        $deductions = 0;

        foreach ($salaryStructure->components as $component) {
            $amount = $component->calculateAmount($basicSalary);
            if ($component->type === 'allowance') {
                $allowances += $amount;
            } else {
                $deductions += $amount;
            }
        }

        $grossSalary = $basicSalary + $allowances;
        $netSalary = $grossSalary - $deductions;

        $payroll = Payroll::create([
            'employee_id' => $validated['employee_id'],
            'pay_period_start' => $validated['pay_period_start'],
            'pay_period_end' => $validated['pay_period_end'],
            'gross_salary' => $grossSalary,
            'total_deductions' => $deductions,
            'net_salary' => $netSalary,
            'status' => 'processed',
            'processed_by' => Auth::id(),
        ]);

        Payslip::create([
            'payroll_id' => $payroll->id,
            'employee_id' => $validated['employee_id'],
            'generated_date' => Carbon::now(),
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll processed successfully.');
    }

    public function show(Payroll $payroll)
    {
        $payroll->load('employee', 'processor', 'payslips');
        return view('payroll.payrolls.show', compact('payroll'));
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}
