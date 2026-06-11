<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTypeDeliverableTemplate extends Model
{
    protected $fillable = [
        'organization_id', 'project_type_id', 'deliverable_type_id', 'title',
        'description', 'suggested_due_offset_days', 'sort_order', 'is_required',
    ];

    protected function casts(): array
    {
        return ['is_required' => 'boolean'];
    }

    public function projectType(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function deliverableType(): BelongsTo
    {
        return $this->belongsTo(DeliverableType::class);
    }
}
