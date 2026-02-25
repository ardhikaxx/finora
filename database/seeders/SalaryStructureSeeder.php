<?php

namespace Database\Seeders;

use App\Models\SalaryStructure;
use App\Models\SalaryComponent;
use Illuminate\Database\Seeder;

class SalaryStructureSeeder extends Seeder
{
    public function run(): void
    {
        // StruktUR GAJI KARYAWAN
        $struktur1 = SalaryStructure::create([
            'name' => 'Staff Junior',
            'basic_salary' => 5000000,
        ]);

        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'Tunjangan Rumah', 'type' => 'allowance', 'amount' => 500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'Tunjangan Transportasi', 'type' => 'allowance', 'amount' => 300000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'Tunjangan Makan', 'type' => 'allowance', 'amount' => 250000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'BPJS Kesehatan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'BPJS Ketenagakerjaan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur1->id, 'name' => 'PPh 21', 'type' => 'deduction', 'amount' => 5, 'is_percentage' => true]);

        // STRUKTUR GAJI STAFF SENIOR
        $struktur2 = SalaryStructure::create([
            'name' => 'Staff Senior',
            'basic_salary' => 8000000,
        ]);

        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'Tunjangan Rumah', 'type' => 'allowance', 'amount' => 1000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'Tunjangan Transportasi', 'type' => 'allowance', 'amount' => 500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'Tunjangan Makan', 'type' => 'allowance', 'amount' => 350000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'Tunjangan Komunikasi', 'type' => 'allowance', 'amount' => 200000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'BPJS Kesehatan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'BPJS Ketenagakerjaan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur2->id, 'name' => 'PPh 21', 'type' => 'deduction', 'amount' => 5, 'is_percentage' => true]);

        // STRUKTUR GAJI MANAGER
        $struktur3 = SalaryStructure::create([
            'name' => 'Manager',
            'basic_salary' => 15000000,
        ]);

        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'Tunjangan Rumah', 'type' => 'allowance', 'amount' => 2500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'Tunjangan Transportasi', 'type' => 'allowance', 'amount' => 1000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'Tunjangan Makan', 'type' => 'allowance', 'amount' => 500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'Tunjangan Komunikasi', 'type' => 'allowance', 'amount' => 500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'Tunjangan Kesehatan', 'type' => 'allowance', 'amount' => 500000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'BPJS Kesehatan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'BPJS Ketenagakerjaan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur3->id, 'name' => 'PPh 21', 'type' => 'deduction', 'amount' => 10, 'is_percentage' => true]);

        // STRUKTUR GAJI DIREKTUR
        $struktur4 = SalaryStructure::create([
            'name' => 'Director',
            'basic_salary' => 25000000,
        ]);

        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Rumah', 'type' => 'allowance', 'amount' => 5000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Transportasi', 'type' => 'allowance', 'amount' => 2000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Makan', 'type' => 'allowance', 'amount' => 750000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Komunikasi', 'type' => 'allowance', 'amount' => 750000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Kesehatan', 'type' => 'allowance', 'amount' => 1000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'Tunjangan Jabatan', 'type' => 'allowance', 'amount' => 2000000, 'is_percentage' => false]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'BPJS Kesehatan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'BPJS Ketenagakerjaan', 'type' => 'deduction', 'amount' => 2, 'is_percentage' => true]);
        SalaryComponent::create(['salary_structure_id' => $struktur4->id, 'name' => 'PPh 21', 'type' => 'deduction', 'amount' => 15, 'is_percentage' => true]);
    }
}
