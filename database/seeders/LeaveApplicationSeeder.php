<?php

namespace Database\Seeders;

use App\Models\LeaveApplication;
use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LeaveApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::where('status', 'active')->get();
        $leaveTypes = LeaveType::all();

        // Create some leave applications
        $leaves = [
            ['employee_id' => 2, 'leave_type_id' => 1, 'start_date' => Carbon::now()->subDays(10), 'end_date' => Carbon::now()->subDays(8), 'reason' => 'Liburan keluarga', 'status' => 'approved'],
            ['employee_id' => 3, 'leave_type_id' => 2, 'start_date' => Carbon::now()->subDays(5), 'end_date' => Carbon::now()->subDays(4), 'reason' => 'Sakit flu', 'status' => 'approved'],
            ['employee_id' => 5, 'leave_type_id' => 1, 'start_date' => Carbon::now()->addDays(5), 'end_date' => Carbon::now()->addDays(7), 'reason' => 'Liburan', 'status' => 'pending'],
            ['employee_id' => 6, 'leave_type_id' => 7, 'start_date' => Carbon::now()->subDays(2), 'end_date' => Carbon::now()->subDays(2), 'reason' => 'Urusan keluarga', 'status' => 'approved'],
            ['employee_id' => 7, 'leave_type_id' => 2, 'start_date' => Carbon::now()->subDays(1), 'end_date' => Carbon::now(), 'reason' => 'Sakit kepala', 'status' => 'pending'],
            ['employee_id' => 8, 'leave_type_id' => 5, 'start_date' => Carbon::now()->subDays(15), 'end_date' => Carbon::now()->subDays(14), 'reason' => 'Kematian kerabat', 'status' => 'approved'],
            ['employee_id' => 9, 'leave_type_id' => 1, 'start_date' => Carbon::now()->addDays(10), 'end_date' => Carbon::now()->addDays(12), 'reason' => 'Liburan panjang', 'status' => 'pending'],
            ['employee_id' => 4, 'leave_type_id' => 3, 'start_date' => Carbon::now()->subDays(20), 'end_date' => Carbon::now()->subDays(15), 'reason' => 'Melahirkan', 'status' => 'approved'],
        ];

        foreach ($leaves as $leave) {
            LeaveApplication::create($leave);
        }
    }
}
