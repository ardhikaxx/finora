<?php

namespace Database\Seeders;

use App\Models\Payroll;
use App\Models\Payslip;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PayrollSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::where('status', 'active')->get();
        $adminUser = User::where('role_id', 1)->first();

        // Create payroll for last 3 months
        for ($month = 1; $month <= 3; $month++) {
            $periodStart = Carbon::now()->subMonths($month)->startOfMonth();
            $periodEnd = Carbon::now()->subMonths($month)->endOfMonth();

            foreach ($employees as $employee) {
                if (!$employee->salaryStructure) {
                    continue;
                }

                $salaryStructure = $employee->salaryStructure;
                $basicSalary = $salaryStructure->basic_salary;
                
                $allowances = 0;
                $deductions = 0;

                foreach ($salaryStructure->components as $component) {
                    if ($component->type == 'allowance') {
                        $allowances += $component->calculateAmount($basicSalary);
                    } else {
                        $deductions += $component->calculateAmount($basicSalary);
                    }
                }

                $grossSalary = $basicSalary + $allowances;
                $netSalary = $grossSalary - $deductions;

                $payroll = Payroll::create([
                    'employee_id' => $employee->id,
                    'pay_period_start' => $periodStart,
                    'pay_period_end' => $periodEnd,
                    'gross_salary' => $grossSalary,
                    'total_deductions' => $deductions,
                    'net_salary' => $netSalary,
                    'status' => 'processed',
                    'processed_by' => $adminUser->id,
                ]);

                Payslip::create([
                    'payroll_id' => $payroll->id,
                    'employee_id' => $employee->id,
                    'generated_date' => Carbon::now(),
                ]);
            }
        }
    }
}
