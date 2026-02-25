<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = Vendor::all();

        $bills = [
            ['vendor_id' => 1, 'bill_number' => 'BILL/2026/001', 'bill_date' => Carbon::now()->subDays(3), 'due_date' => Carbon::now()->addDays(27), 'total_amount' => 15000000, 'status' => 'pending'],
            ['vendor_id' => 1, 'bill_number' => 'BILL/2026/002', 'bill_date' => Carbon::now()->subDays(30), 'due_date' => Carbon::now(), 'total_amount' => 8000000, 'status' => 'overdue'],
            ['vendor_id' => 2, 'bill_number' => 'BILL/2026/003', 'bill_date' => Carbon::now()->subDays(8), 'due_date' => Carbon::now()->addDays(22), 'total_amount' => 5500000, 'status' => 'pending'],
            ['vendor_id' => 3, 'bill_number' => 'BILL/2026/004', 'bill_date' => Carbon::now()->subDays(45), 'due_date' => Carbon::now()->subDays(15), 'total_amount' => 3500000, 'status' => 'overdue'],
            ['vendor_id' => 4, 'bill_number' => 'BILL/2026/005', 'bill_date' => Carbon::now()->subDays(1), 'due_date' => Carbon::now()->addDays(29), 'total_amount' => 4200000, 'status' => 'pending'],
            ['vendor_id' => 5, 'bill_number' => 'BILL/2026/006', 'bill_date' => Carbon::now()->subDays(50), 'due_date' => Carbon::now()->subDays(20), 'total_amount' => 9500000, 'status' => 'paid'],
            ['vendor_id' => 6, 'bill_number' => 'BILL/2026/007', 'bill_date' => Carbon::now()->subDays(20), 'due_date' => Carbon::now()->addDays(10), 'total_amount' => 6800000, 'status' => 'paid'],
            ['vendor_id' => 7, 'bill_number' => 'BILL/2026/008', 'bill_date' => Carbon::now()->subDays(25), 'due_date' => Carbon::now()->addDays(5), 'total_amount' => 7200000, 'status' => 'paid'],
        ];

        foreach ($bills as $bill) {
            Bill::create($bill);
        }
    }
}
