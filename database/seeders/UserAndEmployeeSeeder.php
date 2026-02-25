<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Department;
use App\Models\SalaryStructure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserAndEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $adminRole = Role::where('name', 'Admin')->first();
        $managerRole = Role::where('name', 'Manager')->first();
        $staffRole = Role::where('name', 'Staff')->first();
        
        $hrDept = Department::where('name', 'Sumber Daya Manusia')->first();
        $financeDept = Department::where('name', 'Keuangan')->first();
        $itDept = Department::where('name', 'Teknologi Informasi')->first();
        $marketingDept = Department::where('name', 'Pemasaran')->first();
        $salesDept = Department::where('name', 'Penjualan')->first();
        $opsDept = Department::where('name', 'Operasional')->first();
        
        $staffJunior = SalaryStructure::where('name', 'Staff Junior')->first();
        $staffSenior = SalaryStructure::where('name', 'Staff Senior')->first();
        $manager = SalaryStructure::where('name', 'Manager')->first();
        $director = SalaryStructure::where('name', 'Director')->first();

        // KARYAWAN DIREKTUR
        $emp1 = Employee::create([
            'first_name' => 'Ahmad',
            'last_name' => 'Santoso',
            'date_of_birth' => '1975-03-15',
            'gender' => 'male',
            'address' => 'Jl. Permata Hijau No. 45, Jakarta Selatan',
            'phone_number' => '081234567890',
            'hire_date' => '2015-01-01',
            'job_title' => 'Director',
            'department_id' => $opsDept->id,
            'salary_structure_id' => $director->id,
            'status' => 'active',
        ]);

        // KARYAWAN MANAGER
        $emp2 = Employee::create([
            'first_name' => 'Budi',
            'last_name' => 'Pratama',
            'date_of_birth' => '1985-05-20',
            'gender' => 'male',
            'address' => 'Jl. Melati No. 12, Jakarta Selatan',
            'phone_number' => '081234567891',
            'hire_date' => '2018-03-15',
            'job_title' => 'HR Manager',
            'department_id' => $hrDept->id,
            'salary_structure_id' => $manager->id,
            'status' => 'active',
        ]);

        $emp3 = Employee::create([
            'first_name' => 'Siti',
            'last_name' => 'Wulandari',
            'date_of_birth' => '1988-08-10',
            'gender' => 'female',
            'address' => 'Jl. Mawar No. 23, Bandung',
            'phone_number' => '081234567892',
            'hire_date' => '2019-06-01',
            'job_title' => 'Finance Manager',
            'department_id' => $financeDept->id,
            'salary_structure_id' => $manager->id,
            'status' => 'active',
        ]);

        $emp4 = Employee::create([
            'first_name' => 'Rudi',
            'last_name' => 'Hermawan',
            'date_of_birth' => '1987-02-28',
            'gender' => 'male',
            'address' => 'Jl. Dago No. 56, Bandung',
            'phone_number' => '081234567893',
            'hire_date' => '2017-09-01',
            'job_title' => 'IT Manager',
            'department_id' => $itDept->id,
            'salary_structure_id' => $manager->id,
            'status' => 'active',
        ]);

        // KARYAWAN STAFF SENIOR
        $emp5 = Employee::create([
            'first_name' => 'Dewi',
            'last_name' => 'Kartika',
            'date_of_birth' => '1992-11-05',
            'gender' => 'female',
            'address' => 'Jl. Asia Afrika No. 78, Bandung',
            'phone_number' => '081234567894',
            'hire_date' => '2020-01-15',
            'job_title' => 'Staff Keuangan Senior',
            'department_id' => $financeDept->id,
            'salary_structure_id' => $staffSenior->id,
            'status' => 'active',
        ]);

        $emp6 = Employee::create([
            'first_name' => 'Hendra',
            'last_name' => 'Saputra',
            'date_of_birth' => '1990-07-12',
            'gender' => 'male',
            'address' => 'Jl. Sudirman No. 34, Jakarta Pusat',
            'phone_number' => '081234567895',
            'hire_date' => '2020-03-01',
            'job_title' => 'Staff Marketing',
            'department_id' => $marketingDept->id,
            'salary_structure_id' => $staffSenior->id,
            'status' => 'active',
        ]);

        // KARYAWAN STAFF JUNIOR
        $emp7 = Employee::create([
            'first_name' => 'Nita',
            'last_name' => 'Putri',
            'date_of_birth' => '1998-04-22',
            'gender' => 'female',
            'address' => 'Jl. Braga No. 90, Bandung',
            'phone_number' => '081234567896',
            'hire_date' => '2023-02-01',
            'job_title' => 'Staff Admin',
            'department_id' => $hrDept->id,
            'salary_structure_id' => $staffJunior->id,
            'status' => 'active',
        ]);

        $emp8 = Employee::create([
            'first_name' => 'Fajar',
            'last_name' => 'Nugroho',
            'date_of_birth' => '1995-09-18',
            'gender' => 'male',
            'address' => 'Jl. Merdeka No. 12, Jakarta Barat',
            'phone_number' => '081234567897',
            'hire_date' => '2022-07-15',
            'job_title' => 'Staff Penjualan',
            'department_id' => $salesDept->id,
            'salary_structure_id' => $staffJunior->id,
            'status' => 'active',
        ]);

        $emp9 = Employee::create([
            'first_name' => 'Lina',
            'last_name' => 'Susilowati',
            'date_of_birth' => '1997-12-30',
            'gender' => 'female',
            'address' => 'Jl. Gatot Subroto No. 56, Jakarta Selatan',
            'phone_number' => '081234567898',
            'hire_date' => '2023-06-01',
            'job_title' => 'Staff IT',
            'department_id' => $itDept->id,
            'salary_structure_id' => $staffJunior->id,
            'status' => 'active',
        ]);

        $emp10 = Employee::create([
            'first_name' => 'Andi',
            'last_name' => ' Wijaya',
            'date_of_birth' => '1996-06-25',
            'gender' => 'male',
            'address' => 'Jl. Thamrin No. 78, Jakarta Pusat',
            'phone_number' => '081234567899',
            'hire_date' => '2021-11-01',
            'job_title' => 'Staff Operasional',
            'department_id' => $opsDept->id,
            'salary_structure_id' => $staffJunior->id,
            'status' => 'active',
        ]);

        // USER LOGIN
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@finora.com',
            'password' => Hash::make('password'),
            'role_id' => $superAdminRole->id,
            'employee_id' => $emp1->id,
        ]);

        User::create([
            'name' => 'Admin FINORA',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'employee_id' => $emp2->id,
        ]);

        User::create([
            'name' => 'Manager Keuangan',
            'email' => 'finance@finora.com',
            'password' => Hash::make('password'),
            'role_id' => $managerRole->id,
            'employee_id' => $emp3->id,
        ]);

        User::create([
            'name' => 'Staff Keuangan',
            'email' => 'staff@finora.com',
            'password' => Hash::make('password'),
            'role_id' => $staffRole->id,
            'employee_id' => $emp5->id,
        ]);
    }
}
