<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskLink extends Model
{
    protected $fillable = ['organization_id', 'task_id', 'label', 'url', 'added_by_profile_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function displayLabel(): string
    {
        return $this->label ?: str(parse_url($this->url, PHP_URL_HOST) ?: $this->url)->remove('www.')->toString();
    }
}
