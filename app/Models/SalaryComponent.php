<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalaryComponent extends Model
{
    protected $fillable = [
        'salary_structure_id',
        'name',
        'type',
        'amount',
        'is_percentage',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_percentage' => 'boolean',
    ];

    public function salaryStructure(): BelongsTo
    {
        return $this->belongsTo(SalaryStructure::class);
    }

    public function calculateAmount($basicSalary): float
    {
        if ($this->is_percentage) {
            return ($basicSalary * $this->amount) / 100;
        }
        return (float) $this->amount;
    }
}
