<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'organization_id',
        'conversation_id',
        'author_profile_id',
        'body',
        'message_type',
        'visibility',
        'parent_message_id',
        'metadata_json',
    ];

    protected function casts(): array
    {
        return [
            'metadata_json' => 'array',
        ];
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function authorProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'author_profile_id');
    }

    public function parentMessage(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_message_id');
    }
}
