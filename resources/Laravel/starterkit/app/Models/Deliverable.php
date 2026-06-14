<?php

namespace App\Models;

use App\Enums\DeliverableStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

class Deliverable extends Model
{
    protected $fillable = [
        'organization_id', 'project_id', 'source_request_idea_id', 'deliverable_type_id',
        'owner_profile_id', 'internal_reviewer_profile_id', 'stakeholder_reviewer_profile_id',
        'title', 'description', 'lifecycle_status', 'attention_state', 'sort_order',
        'purpose', 'audience', 'desired_action', 'due_date', 'publish_date',
        'metadata_json', 'archived_at',
        'upload_slug', 'upload_open', 'upload_closes_at',
    ];

    protected function casts(): array
    {
        return [
            'lifecycle_status' => DeliverableStatus::class,
            'due_date' => 'date',
            'publish_date' => 'date',
            'metadata_json'      => 'array',
            'archived_at'        => 'datetime',
            'upload_open'        => 'boolean',
            'upload_closes_at'   => 'datetime',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function sourceRequestIdea(): BelongsTo
    {
        return $this->belongsTo(RequestIdea::class, 'source_request_idea_id');
    }

    public function deliverableType(): BelongsTo
    {
        return $this->belongsTo(DeliverableType::class);
    }

    public function ownerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'owner_profile_id');
    }

    public function internalReviewerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'internal_reviewer_profile_id');
    }

    public function stakeholderReviewerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'stakeholder_reviewer_profile_id');
    }

    public function conversation(): MorphOne
    {
        return $this->morphOne(Conversation::class, 'subject');
    }

    public function activityEvents(): HasMany
    {
        return $this->hasMany(ProjectActivityEvent::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(DeliverableLink::class)->latest();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(DeliverableReview::class)
            ->orderByDesc('round_number')
            ->orderBy('id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)
            ->orderByRaw("CASE priority WHEN 'Urgent' THEN 0 WHEN 'High' THEN 1 ELSE 2 END")
            ->orderBy('due_date')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function timeBudgetMinutes(): int
    {
        return (int) $this->tasks()->sum('time_budget_minutes');
    }

    public function mediaFiles(): HasMany
    {
        return $this->hasMany(MediaFile::class)->orderByTaken();
    }

    public function isPhotoCollection(): bool
    {
        return $this->deliverableType?->slug === 'photo-collection';
    }

    public function uploadUrl(): ?string
    {
        if (! $this->upload_slug) {
            return null;
        }

        return route('upload.show', $this->upload_slug);
    }

    public function uploadIsOpen(): bool
    {
        return $this->upload_open &&
            (! $this->upload_closes_at || $this->upload_closes_at->isFuture());
    }
}
