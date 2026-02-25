<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_date',
        'description',
        'reference_number',
        'transaction_type',
    ];

    protected $casts = [
        'transaction_date' => 'date',
    ];

    public function journalEntries(): HasMany
    {
        return $this->hasMany(JournalEntry::class);
    }

    public function getDebitTotalAttribute(): float
    {
        return $this->journalEntries->sum('debit');
    }

    public function getCreditTotalAttribute(): float
    {
        return $this->journalEntries->sum('credit');
    }

    public function isBalanced(): bool
    {
        return $this->debit_total === $this->credit_total;
    }
}
