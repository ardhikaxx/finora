<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'users.view', 'description' => 'Melihat pengguna'],
            ['name' => 'users.create', 'description' => 'Membuat pengguna'],
            ['name' => 'users.edit', 'description' => 'Mengedit pengguna'],
            ['name' => 'users.delete', 'description' => 'Menghapus pengguna'],
            
            ['name' => 'roles.view', 'description' => 'Melihat peran'],
            ['name' => 'roles.create', 'description' => 'Membuat peran'],
            ['name' => 'roles.edit', 'description' => 'Mengedit peran'],
            ['name' => 'roles.delete', 'description' => 'Menghapus peran'],
            
            ['name' => 'employees.view', 'description' => 'Melihat karyawan'],
            ['name' => 'employees.create', 'description' => 'Membuat karyawan'],
            ['name' => 'employees.edit', 'description' => 'Mengedit karyawan'],
            ['name' => 'employees.delete', 'description' => 'Menghapus karyawan'],
            
            ['name' => 'payroll.process', 'description' => 'Memproses payroll'],
            ['name' => 'payroll.view', 'description' => 'Melihat payroll'],
            
            ['name' => 'accounts.view', 'description' => 'Melihat bagan akun'],
            ['name' => 'accounts.create', 'description' => 'Membuat akun'],
            ['name' => 'accounts.edit', 'description' => 'Mengedit akun'],
            
            ['name' => 'journal.view', 'description' => 'Melihat jurnal'],
            ['name' => 'journal.create', 'description' => 'Membuat entri jurnal'],
            
            ['name' => 'invoices.view', 'description' => 'Melihat faktur'],
            ['name' => 'invoices.create', 'description' => 'Membuat faktur'],
            
            ['name' => 'bills.view', 'description' => 'Melihat tagihan'],
            ['name' => 'bills.create', 'description' => 'Membuat tagihan'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
