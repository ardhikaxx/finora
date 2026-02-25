<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    public function index(Request $request)
    {
        $query = ChartOfAccount::query();

        if ($request->account_type) {
            $query->where('account_type', $request->account_type);
        }

        $accounts = $query->orderBy('account_number')->get();
        return view('finance.accounts.index', compact('accounts'));
    }

    public function create()
    {
        $parentAccounts = ChartOfAccount::orderBy('account_number')->get();
        return view('finance.accounts.create', compact('parentAccounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|unique:chart_of_accounts,account_number',
            'account_type' => 'required|string|in:asset,liability,equity,revenue,expense',
            'parent_account_id' => 'nullable|exists:chart_of_accounts,id',
        ]);

        ChartOfAccount::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function show(ChartOfAccount $account)
    {
        $account->load('parentAccount', 'childAccounts', 'journalEntries');
        return view('finance.accounts.show', compact('account'));
    }

    public function edit(ChartOfAccount $account)
    {
        $parentAccounts = ChartOfAccount::orderBy('account_number')->get();
        return view('finance.accounts.edit', compact('account', 'parentAccounts'));
    }

    public function update(Request $request, ChartOfAccount $account)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|unique:chart_of_accounts,account_number,' . $account->id,
            'account_type' => 'required|string|in:asset,liability,equity,revenue,expense',
            'parent_account_id' => 'nullable|exists:chart_of_accounts,id',
        ]);

        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(ChartOfAccount $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
