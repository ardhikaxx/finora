<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin', 'description' => 'Akses penuh ke seluruh sistem'],
            ['name' => 'Admin', 'description' => 'Akses administratif penuh kecuali konfigurasi super admin'],
            ['name' => 'Manager', 'description' => 'Mengelola departemen dan menyetujui laporan'],
            ['name' => 'Staff', 'description' => 'Karyawan dengan akses terbatas'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
