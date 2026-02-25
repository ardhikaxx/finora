<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Vendor;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $query = Bill::with('vendor');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bills = $query->orderBy('bill_date', 'desc')->get();
        $vendors = Vendor::all();

        return view('finance.bills.index', compact('bills', 'vendors'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('finance.bills.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'bill_number' => 'required|string|unique:bills,bill_number',
            'bill_date' => 'required|date',
            'due_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        Bill::create($validated);

        return redirect()->route('bills.index')->with('success', 'Bill created successfully.');
    }

    public function show(Bill $bill)
    {
        $bill->load('vendor');
        return view('finance.bills.show', compact('bill'));
    }

    public function edit(Bill $bill)
    {
        $vendors = Vendor::all();
        return view('finance.bills.edit', compact('bill', 'vendors'));
    }

    public function update(Request $request, Bill $bill)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'bill_number' => 'required|string|unique:bills,bill_number,' . $bill->id,
            'bill_date' => 'required|date',
            'due_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,paid,overdue',
        ]);

        $bill->update($validated);

        return redirect()->route('bills.index')->with('success', 'Bill updated successfully.');
    }

    public function markAsPaid(Bill $bill)
    {
        $bill->update(['status' => 'paid']);
        return redirect()->route('bills.index')->with('success', 'Bill marked as paid.');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }
}
