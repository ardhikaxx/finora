<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\JournalEntry;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with('journalEntries.account');

        if ($request->date_from) {
            $query->where('transaction_date', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->where('transaction_date', '<=', $request->date_to);
        }

        $transactions = $query->orderBy('transaction_date', 'desc')->get();
        return view('finance.journal-entries.index', compact('transactions'));
    }

    public function create()
    {
        $accounts = ChartOfAccount::orderBy('account_number')->get();
        return view('finance.journal-entries.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'description' => 'nullable|string',
            'reference_number' => 'nullable|string',
            'entries' => 'required|array|min:2',
            'entries.*.account_id' => 'required|exists:chart_of_accounts,id',
            'entries.*.debit' => 'required|numeric|min:0',
            'entries.*.credit' => 'required|numeric|min:0',
        ]);

        $totalDebit = collect($validated['entries'])->sum('debit');
        $totalCredit = collect($validated['entries'])->sum('credit');

        if (abs($totalDebit - $totalCredit) > 0.01) {
            return back()->with('error', 'Debit and Credit must be equal.');
        }

        $transaction = Transaction::create([
            'transaction_date' => $validated['transaction_date'],
            'description' => $validated['description'],
            'reference_number' => $validated['reference_number'],
            'transaction_type' => $totalDebit > 0 ? 'debit' : 'credit',
        ]);

        foreach ($validated['entries'] as $entry) {
            if ($entry['debit'] > 0 || $entry['credit'] > 0) {
                JournalEntry::create([
                    'transaction_id' => $transaction->id,
                    'account_id' => $entry['account_id'],
                    'debit' => $entry['debit'],
                    'credit' => $entry['credit'],
                ]);
            }
        }

        return redirect()->route('journal-entries.index')->with('success', 'Journal entry created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('journalEntries.account');
        return view('finance.journal-entries.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('journal-entries.index')->with('success', 'Journal entry deleted successfully.');
    }
}
