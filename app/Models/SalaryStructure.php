<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalaryStructure extends Model
{
    protected $fillable = ['name', 'basic_salary'];

    protected $casts = [
        'basic_salary' => 'decimal:2',
    ];

    public function components(): HasMany
    {
        return $this->hasMany(SalaryComponent::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function getAllowances()
    {
        return $this->components()->where('type', 'allowance')->get();
    }

    public function getDeductions()
    {
        return $this->components()->where('type', 'deduction')->get();
    }
}
