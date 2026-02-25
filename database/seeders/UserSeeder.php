<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Department;
use App\Models\SalaryStructure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $adminRole = Role::where('name', 'Admin')->first();
        $hrDepartment = Department::where('name', 'Human Resources')->first();
        $financeDepartment = Department::where('name', 'Finance')->first();
        $standardSalary = SalaryStructure::where('name', 'Standard')->first();

        $employee1 = Employee::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1985-05-15',
            'gender' => 'male',
            'address' => 'Jakarta',
            'phone_number' => '081234567890',
            'hire_date' => '2020-01-01',
            'job_title' => 'HR Manager',
            'department_id' => $hrDepartment->id,
            'salary_structure_id' => $standardSalary->id,
            'status' => 'active',
        ]);

        $employee2 = Employee::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'date_of_birth' => '1990-08-20',
            'gender' => 'female',
            'address' => 'Bandung',
            'phone_number' => '081234567891',
            'hire_date' => '2021-03-15',
            'job_title' => 'Finance Manager',
            'department_id' => $financeDepartment->id,
            'salary_structure_id' => $standardSalary->id,
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@finora.com',
            'password' => Hash::make('password'),
            'role_id' => $superAdminRole->id,
            'employee_id' => $employee1->id,
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'employee_id' => $employee2->id,
        ]);
    }
}
