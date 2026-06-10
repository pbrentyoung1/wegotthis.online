<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MinistryRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'organization_id',
        'department_id',
        'requester_profile_id',
        'assigned_manager_profile_id',
        'title',
        'status',
        'ministry_need',
        'why_it_matters',
        'audience',
        'desired_action',
        'desired_tone',
        'key_dates_json',
        'known_constraints',
        'missing_information_json',
        'triage_summary',
        'submitted_at',
        'decision_at',
        'decision_by_profile_id',
        'decision_notes',
        'archived_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => RequestStatus::class,
            'key_dates_json' => 'array',
            'missing_information_json' => 'array',
            'submitted_at' => 'datetime',
            'decision_at' => 'datetime',
            'archived_at' => 'datetime',
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function requesterProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'requester_profile_id');
    }

    public function assignedManagerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'assigned_manager_profile_id');
    }

    public function decisionByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'decision_by_profile_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(RequestAnswer::class, 'request_id');
    }

    public function ideas(): HasMany
    {
        return $this->hasMany(RequestIdea::class, 'request_id');
    }
}
