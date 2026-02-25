<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Department;
use App\Models\SalaryStructure;
use App\Models\SalaryComponent;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Attendance;
use App\Models\LeaveApplication;
use App\Models\Payroll;
use App\Models\ChartOfAccount;
use App\Models\Transaction;
use App\Models\JournalEntry;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Vendor;
use App\Models\Bill;
use App\Models\Budget;
use App\Models\BudgetAllocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            DepartmentSeeder::class,
            SalaryStructureSeeder::class,
            LeaveTypeSeeder::class,
            ChartOfAccountSeeder::class,
            CustomerSeeder::class,
            VendorSeeder::class,
            UserAndEmployeeSeeder::class,
            AttendanceSeeder::class,
            LeaveApplicationSeeder::class,
            PayrollSeeder::class,
            TransactionSeeder::class,
            InvoiceSeeder::class,
            BillSeeder::class,
            BudgetSeeder::class,
        ]);
    }
}
