<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deliverable extends Model
{
    protected $fillable = [
        'organization_id', 'project_id', 'source_request_idea_id', 'deliverable_type_id',
        'owner_profile_id', 'title', 'description', 'lifecycle_status', 'attention_state',
        'purpose', 'audience', 'desired_action', 'due_date', 'metadata_json', 'archived_at',
    ];

    protected function casts(): array
    {
        return ['due_date' => 'date', 'metadata_json' => 'array', 'archived_at' => 'datetime'];
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
}
