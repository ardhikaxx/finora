<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChartOfAccount extends Model
{
    protected $fillable = [
        'account_name',
        'account_number',
        'account_type',
        'parent_account_id',
    ];

    public function parentAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class, 'parent_account_id');
    }

    public function childAccounts(): HasMany
    {
        return $this->hasMany(ChartOfAccount::class, 'parent_account_id');
    }

    public function journalEntries(): HasMany
    {
        return $this->hasMany(JournalEntry::class);
    }

    public function budgetAllocations(): HasMany
    {
        return $this->hasMany(BudgetAllocation::class);
    }

    public function scopeAssets($query)
    {
        return $query->where('account_type', 'asset');
    }

    public function scopeLiabilities($query)
    {
        return $query->where('account_type', 'liability');
    }

    public function scopeEquity($query)
    {
        return $query->where('account_type', 'equity');
    }

    public function scopeRevenue($query)
    {
        return $query->where('account_type', 'revenue');
    }

    public function scopeExpenses($query)
    {
        return $query->where('account_type', 'expense');
    }
}
