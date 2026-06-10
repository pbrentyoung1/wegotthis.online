<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'name',
        'slug',
        'parent_department_id',
        'lead_profile_id',
        'status',
        'notes',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function parentDepartment(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_department_id');
    }

    public function childDepartments(): HasMany
    {
        return $this->hasMany(self::class, 'parent_department_id');
    }

    public function leadProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'lead_profile_id');
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function requests(): HasMany
    {
        return $this->hasMany(MinistryRequest::class);
    }
}
