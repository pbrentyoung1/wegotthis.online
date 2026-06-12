<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliverableReview extends Model
{
    protected $fillable = [
        'organization_id', 'deliverable_id', 'reviewer_profile_id', 'round_number',
        'reviewer_role', 'decision', 'notes', 'decided_at',
    ];

    protected function casts(): array
    {
        return ['decided_at' => 'datetime'];
    }

    public function deliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class);
    }

    public function reviewerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'reviewer_profile_id');
    }
}
