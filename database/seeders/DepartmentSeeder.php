<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Sumber Daya Manusia', 'description' => 'Departemen SDM dan Personalia'],
            ['name' => 'Keuangan', 'description' => 'Departemen Keuangan dan Akuntansi'],
            ['name' => 'Teknologi Informasi', 'description' => 'Departemen IT dan Sistem'],
            ['name' => 'Pemasaran', 'description' => 'Departemen Pemasaran dan Promosi'],
            ['name' => 'Penjualan', 'description' => 'Departemen Penjualan'],
            ['name' => 'Operasional', 'description' => 'Departemen Operasional'],
            ['name' => 'Produksi', 'description' => 'Departemen Produksi'],
            ['name' => 'Purchasing', 'description' => 'Departemen Pengadaan'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
