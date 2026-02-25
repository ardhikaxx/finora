<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();

        $invoices = [
            ['customer_id' => 1, 'invoice_number' => 'INV/2026/001', 'invoice_date' => Carbon::now()->subDays(5), 'due_date' => Carbon::now()->addDays(25), 'total_amount' => 25000000, 'status' => 'pending'],
            ['customer_id' => 1, 'invoice_number' => 'INV/2026/002', 'invoice_date' => Carbon::now()->subDays(35), 'due_date' => Carbon::now()->subDays(5), 'total_amount' => 15000000, 'status' => 'overdue'],
            ['customer_id' => 2, 'invoice_number' => 'INV/2026/003', 'invoice_date' => Carbon::now()->subDays(10), 'due_date' => Carbon::now()->addDays(20), 'total_amount' => 35000000, 'status' => 'pending'],
            ['customer_id' => 3, 'invoice_number' => 'INV/2026/004', 'invoice_date' => Carbon::now()->subDays(40), 'due_date' => Carbon::now()->subDays(10), 'total_amount' => 20000000, 'status' => 'overdue'],
            ['customer_id' => 4, 'invoice_number' => 'INV/2026/005', 'invoice_date' => Carbon::now()->subDays(2), 'due_date' => Carbon::now()->addDays(28), 'total_amount' => 12500000, 'status' => 'pending'],
            ['customer_id' => 5, 'invoice_number' => 'INV/2026/006', 'invoice_date' => Carbon::now()->subDays(60), 'due_date' => Carbon::now()->subDays(30), 'total_amount' => 45000000, 'status' => 'paid'],
            ['customer_id' => 6, 'invoice_number' => 'INV/2026/007', 'invoice_date' => Carbon::now()->subDays(15), 'due_date' => Carbon::now()->addDays(15), 'total_amount' => 18000000, 'status' => 'paid'],
            ['customer_id' => 2, 'invoice_number' => 'INV/2026/008', 'invoice_date' => Carbon::now()->subDays(20), 'due_date' => Carbon::now()->addDays(10), 'total_amount' => 22000000, 'status' => 'paid'],
        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}
