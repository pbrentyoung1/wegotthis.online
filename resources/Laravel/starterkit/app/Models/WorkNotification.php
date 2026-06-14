<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkNotification extends Model
{
    protected $fillable = [
        'organization_id', 'recipient_profile_id', 'actor_profile_id', 'notification_type',
        'subject_type', 'subject_id', 'title', 'body', 'action_url', 'read_at', 'metadata_json',
    ];

    protected function casts(): array
    {
        return ['read_at' => 'datetime', 'metadata_json' => 'array'];
    }

    public function recipientProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'recipient_profile_id');
    }

    public function iconClass(): string
    {
        return match ($this->notification_type) {
            'Blocked' => 'tabler--alert-triangle',
            'Needs Approval' => 'tabler--clipboard-check',
            'Unblocked' => 'tabler--circle-check',
            default => 'tabler--bell',
        };
    }

    public function colorClass(): string
    {
        return match ($this->notification_type) {
            'Blocked' => 'bg-danger/15 text-danger',
            'Needs Approval' => 'bg-secondary/15 text-secondary',
            'Unblocked' => 'bg-success/15 text-success',
            default => 'bg-primary/15 text-primary',
        };
    }
}
