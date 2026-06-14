<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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

    public function replies(): HasMany
    {
        return $this->hasMany(self::class, 'parent_message_id')->oldest()->orderBy('id');
    }

    public function textPreview(int $limit = 80): ?string
    {
        if (! $this->body) {
            return null;
        }

        $decoded = json_decode($this->body, true);

        if (json_last_error() === JSON_ERROR_NONE && isset($decoded['ops'])) {
            $text = collect($decoded['ops'])
                ->filter(fn ($op) => isset($op['insert']) && is_string($op['insert']))
                ->pluck('insert')
                ->join('');

            return Str::limit(trim($text), $limit) ?: null;
        }

        return Str::limit(strip_tags($this->body), $limit) ?: null;
    }
}
