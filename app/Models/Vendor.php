<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address'];

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class);
    }

    public function getTotalPayableAttribute(): float
    {
        return $this->bills()
            ->whereIn('status', ['pending', 'overdue'])
            ->sum('total_amount');
    }
}
