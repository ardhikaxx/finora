<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\BudgetAllocation;
use App\Models\ChartOfAccount;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BudgetSeeder extends Seeder
{
    public function run(): void
    {
        // Budget Tahunan 2026
        $budget1 = Budget::create([
            'name' => 'Budget Tahunan 2026',
            'start_date' => Carbon::createFromDate(2026, 1, 1),
            'end_date' => Carbon::createFromDate(2026, 12, 31),
            'total_amount' => 600000000,
        ]);

        $pendapatanPenjualan = ChartOfAccount::where('account_number', '4100')->first();
        $pendapatanJasa = ChartOfAccount::where('account_number', '4200')->first();
        $bebanGaji = ChartOfAccount::where('account_number', '5100')->first();
        $bebanSewa = ChartOfAccount::where('account_number', '5200')->first();
        $bebanListrik = ChartOfAccount::where('account_number', '5300')->first();

        BudgetAllocation::create(['budget_id' => $budget1->id, 'account_id' => $pendapatanPenjualan->id, 'allocated_amount' => 400000000]);
        BudgetAllocation::create(['budget_id' => $budget1->id, 'account_id' => $pendapatanJasa->id, 'allocated_amount' => 200000000]);
        BudgetAllocation::create(['budget_id' => $budget1->id, 'account_id' => $bebanGaji->id, 'allocated_amount' => 250000000]);
        BudgetAllocation::create(['budget_id' => $budget1->id, 'account_id' => $bebanSewa->id, 'allocated_amount' => 180000000]);
        BudgetAllocation::create(['budget_id' => $budget1->id, 'account_id' => $bebanListrik->id, 'allocated_amount' => 42000000]);

        // Budget Q1 2026
        $budget2 = Budget::create([
            'name' => 'Budget Q1 2026',
            'start_date' => Carbon::createFromDate(2026, 1, 1),
            'end_date' => Carbon::createFromDate(2026, 3, 31),
            'total_amount' => 150000000,
        ]);

        BudgetAllocation::create(['budget_id' => $budget2->id, 'account_id' => $pendapatanPenjualan->id, 'allocated_amount' => 100000000]);
        BudgetAllocation::create(['budget_id' => $budget2->id, 'account_id' => $pendapatanJasa->id, 'allocated_amount' => 50000000]);
        BudgetAllocation::create(['budget_id' => $budget2->id, 'account_id' => $bebanGaji->id, 'allocated_amount' => 62500000]);
    }
}
