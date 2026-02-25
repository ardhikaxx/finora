<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    public function run(): void
    {
        $leaveTypes = [
            ['name' => 'Cuti Tahunan', 'description' => 'Cuti tahunan regular', 'max_days' => 12],
            ['name' => 'Cuti Sakit', 'description' => 'Cuti karena sakit', 'max_days' => 14],
            ['name' => 'Cuti Melahirkan', 'description' => 'Cuti melahirkan', 'max_days' => 90],
            ['name' => 'Cuti Paternitas', 'description' => 'Cuti paternitas', 'max_days' => 7],
            ['name' => 'Cuti Kedukaan', 'description' => 'Cuti karena kematian keluarga', 'max_days' => 3],
            ['name' => 'Cuti Khusus', 'description' => 'Cuti khusus dengan alasan tertentu', 'max_days' => 5],
            ['name' => 'Izin Tidak Masuk', 'description' => 'Izin tidak masuk kerja', 'max_days' => 10],
            ['name' => 'Cuti Tanpa Bayaran', 'description' => 'Cuti tanpa gaji', 'max_days' => 30],
        ];

        foreach ($leaveTypes as $leaveType) {
            LeaveType::create($leaveType);
        }
    }
}
