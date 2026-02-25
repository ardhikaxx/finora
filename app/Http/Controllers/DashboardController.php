<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Invoice;
use App\Models\Bill;
use App\Models\Department;
use App\Models\ChartOfAccount;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_employees' => Employee::count(),
            'active_employees' => Employee::where('status', 'active')->count(),
            'total_departments' => Department::count(),
            'pending_leave_applications' => \App\Models\LeaveApplication::where('status', 'pending')->count(),
        ];

        $financialStats = [
            'total_revenue' => Invoice::where('status', 'paid')->sum('total_amount'),
            'total_expenses' => Bill::where('status', 'paid')->sum('total_amount'),
            'accounts_receivable' => Invoice::whereIn('status', ['pending', 'overdue'])->sum('total_amount'),
            'accounts_payable' => Bill::whereIn('status', ['pending', 'overdue'])->sum('total_amount'),
        ];

        $recentPayrolls = Payroll::with('employee')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentInvoices = Invoice::with('customer')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'financialStats', 'recentPayrolls', 'recentInvoices'));
    }
}
