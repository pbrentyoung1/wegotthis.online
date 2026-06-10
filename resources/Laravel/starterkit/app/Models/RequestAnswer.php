<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'request_id',
        'question_key',
        'question_label',
        'answer_type',
        'answer_value',
        'answer_json',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'answer_json' => 'array',
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function request(): BelongsTo
    {
        return $this->belongsTo(MinistryRequest::class, 'request_id');
    }
}
