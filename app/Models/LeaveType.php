<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeaveType extends Model
{
    protected $fillable = ['name', 'description', 'max_days'];

    public function leaveApplications(): HasMany
    {
        return $this->hasMany(LeaveApplication::class);
    }
}
