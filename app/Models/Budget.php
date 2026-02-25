<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'total_amount',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    public function allocations(): HasMany
    {
        return $this->hasMany(BudgetAllocation::class);
    }

    public function getAllocatedTotalAttribute(): float
    {
        return $this->allocations->sum('allocated_amount');
    }

    public function getRemainingAttribute(): float
    {
        return $this->total_amount - $this->allocated_total;
    }
}
