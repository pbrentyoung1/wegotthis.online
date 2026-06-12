<?php

namespace App\Models;

use App\Enums\TaskStatus;
use App\Enums\TaskType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    protected $fillable = [
        'organization_id', 'deliverable_id', 'assigned_to_profile_id', 'title', 'description',
        'status', 'priority', 'due_date', 'time_budget_minutes', 'blocker_type', 'blocker_reason',
        'sort_order', 'completed_by_profile_id', 'completed_at', 'metadata_json',
    ];

    protected function casts(): array
    {
        return [
            'status' => TaskStatus::class,
            'due_date' => 'date',
            'completed_at' => 'datetime',
            'metadata_json' => 'array',
        ];
    }

    public function deliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class);
    }

    public function assigneeProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'assigned_to_profile_id');
    }

    public function completedByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'completed_by_profile_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(TaskLink::class)->latest();
    }

    public function activityEvents(): HasMany
    {
        return $this->hasMany(ProjectActivityEvent::class);
    }

    public function taskType(): TaskType
    {
        return match ($this->metadata_json['task_type'] ?? null) {
            TaskType::Clarification->value, 'Clarification Response' => TaskType::Clarification,
            default => TaskType::Work,
        };
    }

    public function formattedTimeBudget(): string
    {
        if (! $this->time_budget_minutes) {
            return 'Not budgeted';
        }

        $hours = intdiv($this->time_budget_minutes, 60);
        $minutes = $this->time_budget_minutes % 60;

        return collect([$hours ? "{$hours}h" : null, $minutes ? "{$minutes}m" : null])->filter()->implode(' ');
    }
}
