<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestIdea extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'request_id',
        'suggested_by_profile_id',
        'title',
        'idea_type',
        'source',
        'triage_decision',
        'decision_notes',
        'converted_deliverable_id',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function request(): BelongsTo
    {
        return $this->belongsTo(MinistryRequest::class, 'request_id');
    }

    public function suggestedByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'suggested_by_profile_id');
    }

    public function convertedDeliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class, 'converted_deliverable_id');
    }
}
