<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileRoleAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'profile_id',
        'role_id',
        'scope_type',
        'scope_id',
        'assigned_by_profile_id',
        'assigned_at',
        'ended_at',
    ];

    protected function casts(): array
    {
        return [
            'assigned_at' => 'datetime',
            'ended_at' => 'datetime',
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function assignedByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'assigned_by_profile_id');
    }
}
