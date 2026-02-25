<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'employee_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->role && $this->role->name === $role;
        }
        return $this->role && $role->contains('id', $this->role->id);
    }

    public function hasPermission($permission): bool
    {
        if (!$this->role) {
            return false;
        }
        return $this->role->hasPermission($permission);
    }

    public function approvedLeaveApplications(): HasMany
    {
        return $this->hasMany(LeaveApplication::class, 'approved_by');
    }

    public function processedPayrolls(): HasMany
    {
        return $this->hasMany(Payroll::class, 'processed_by');
    }
}
