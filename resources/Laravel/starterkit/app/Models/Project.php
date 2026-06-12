<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'organization_id', 'department_id', 'source_request_id', 'owner_profile_id', 'project_type_id',
        'title', 'slug', 'project_type', 'lifecycle_status', 'attention_state',
        'objective', 'scope_summary', 'audience', 'desired_action', 'start_date',
        'stop_date', 'metadata_json', 'archived_at',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'stop_date' => 'date',
            'metadata_json' => 'array',
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

    public function sourceRequest(): BelongsTo
    {
        return $this->belongsTo(MinistryRequest::class, 'source_request_id');
    }

    public function ownerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'owner_profile_id');
    }

    public function projectTypeTemplate(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function deliverables(): HasMany
    {
        return $this->hasMany(Deliverable::class)->orderBy('sort_order')->orderBy('id');
    }

    public function activityEvents(): HasMany
    {
        return $this->hasMany(ProjectActivityEvent::class);
    }

    public function timeBudgetMinutes(): int
    {
        return (int) Task::query()
            ->whereHas('deliverable', fn ($query) => $query->where('project_id', $this->id))
            ->sum('time_budget_minutes');
    }
}
