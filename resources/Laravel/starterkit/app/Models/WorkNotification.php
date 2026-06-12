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
}
