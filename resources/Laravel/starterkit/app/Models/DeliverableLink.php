<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliverableLink extends Model
{
    protected $fillable = [
        'organization_id',
        'deliverable_id',
        'label',
        'url',
        'added_by_profile_id',
    ];

    public function deliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class);
    }

    public function addedByProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'added_by_profile_id');
    }

    public function displayLabel(): string
    {
        if ($this->label) {
            return $this->label;
        }

        $host = parse_url($this->url, PHP_URL_HOST) ?: $this->url;

        return str($host)->remove('www.')->toString();
    }
}
