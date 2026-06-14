<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Conversation extends Model
{
    protected $fillable = [
        'organization_id',
        'conversation_type',
        'subject_type',
        'subject_id',
        'title',
        'visibility',
        'status',
        'created_by_profile_id',
    ];

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function createdByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'created_by_profile_id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(ConversationParticipant::class);
    }

    public function latestMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function scopeDirect(Builder $query): Builder
    {
        return $query->where('conversation_type', 'Direct');
    }

    public function url(): string
    {
        if ($this->conversation_type === 'Direct') {
            return route('conversations.show', $this);
        }

        $subject = $this->subject;

        if (! $subject) {
            return '#';
        }

        return match (true) {
            $subject instanceof MinistryRequest => route('requests.show', $subject),
            $subject instanceof Project => route('projects.show', $subject),
            $subject instanceof Deliverable => route('deliverables.show', [$subject->project, $subject]),
            $subject instanceof Task => route('tasks.show', [$subject->deliverable->project, $subject->deliverable, $subject]),
            default => '#',
        };
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->oldest()->orderBy('id');
    }
}
