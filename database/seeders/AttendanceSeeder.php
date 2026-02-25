<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::where('status', 'active')->get();
        $today = Carbon::today();

        foreach ($employees as $employee) {
            for ($i = 30; $i >= 0; $i--) {
                $date = $today->copy()->subDays($i);
                
                // Skip weekends
                if ($date->dayOfWeek == Carbon::SATURDAY || $date->dayOfWeek == Carbon::SUNDAY) {
                    continue;
                }

                // Randomly determine status
                $random = rand(1, 100);
                
                if ($random <= 85) {
                    // Present
                    $checkIn = Carbon::createFromTime(8, rand(0, 15), 0);
                    $checkOut = Carbon::createFromTime(17, rand(0, 30), 0);
                    
                    Attendance::create([
                        'employee_id' => $employee->id,
                        'date' => $date,
                        'check_in_time' => $checkIn,
                        'check_out_time' => $checkOut,
                        'status' => 'present',
                    ]);
                } elseif ($random <= 95) {
                    // Late
                    $checkIn = Carbon::createFromTime(8, rand(30, 59), 0);
                    $checkOut = Carbon::createFromTime(17, rand(0, 30), 0);
                    
                    Attendance::create([
                        'employee_id' => $employee->id,
                        'date' => $date,
                        'check_in_time' => $checkIn,
                        'check_out_time' => $checkOut,
                        'status' => 'late',
                    ]);
                } else {
                    // Leave/Absent
                    Attendance::create([
                        'employee_id' => $employee->id,
                        'date' => $date,
                        'check_in_time' => null,
                        'check_out_time' => null,
                        'status' => 'leave',
                    ]);
                }
            }
        }
    }
}
