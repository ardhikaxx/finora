<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetAllocation;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::with('allocations.account')->get();
        return view('finance.budgets.index', compact('budgets'));
    }

    public function create()
    {
        $accounts = ChartOfAccount::whereIn('account_type', ['revenue', 'expense'])->orderBy('account_number')->get();
        return view('finance.budgets.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $budget = Budget::create($validated);

        if ($request->has('allocations')) {
            foreach ($request->allocations as $allocation) {
                if (!empty($allocation['account_id']) && !empty($allocation['allocated_amount'])) {
                    BudgetAllocation::create([
                        'budget_id' => $budget->id,
                        'account_id' => $allocation['account_id'],
                        'allocated_amount' => $allocation['allocated_amount'],
                    ]);
                }
            }
        }

        return redirect()->route('budgets.index')->with('success', 'Budget created successfully.');
    }

    public function show(Budget $budget)
    {
        $budget->load('allocations.account');
        return view('finance.budgets.show', compact('budget'));
    }

    public function edit(Budget $budget)
    {
        $budget->load('allocations');
        $accounts = ChartOfAccount::whereIn('account_type', ['revenue', 'expense'])->orderBy('account_number')->get();
        return view('finance.budgets.edit', compact('budget', 'accounts'));
    }

    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $budget->update($validated);

        if ($request->has('allocations')) {
            $budget->allocations()->delete();
            foreach ($request->allocations as $allocation) {
                if (!empty($allocation['account_id']) && !empty($allocation['allocated_amount'])) {
                    BudgetAllocation::create([
                        'budget_id' => $budget->id,
                        'account_id' => $allocation['account_id'],
                        'allocated_amount' => $allocation['allocated_amount'],
                    ]);
                }
            }
        }

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully.');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budgets.index')->with('success', 'Budget deleted successfully.');
    }
}
