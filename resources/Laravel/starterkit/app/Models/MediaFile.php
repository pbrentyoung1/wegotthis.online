<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class MediaFile extends Model
{
    protected $fillable = [
        'organization_id', 'deliverable_id',
        'uploader_name', 'uploader_ip',
        'file_path', 'thumbnail_path', 'file_name', 'file_size', 'mime_type',
        'exif_taken_at', 'exif_gps_lat', 'exif_gps_lng',
        'exif_device_make', 'exif_device_model',
        'exif_width', 'exif_height', 'exif_orientation',
        'exif_aperture', 'exif_shutter_speed', 'exif_iso',
        'is_favorite', 'approved_for_use', 'caption', 'notes', 'tags',
    ];

    protected function casts(): array
    {
        return [
            'exif_taken_at' => 'datetime',
            'exif_gps_lat'  => 'float',
            'exif_gps_lng'  => 'float',
            'is_favorite'       => 'boolean',
            'approved_for_use'  => 'boolean',
            'tags'              => 'array',
        ];
    }

    public function deliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function crops(): HasMany
    {
        return $this->hasMany(MediaFileCrop::class);
    }

    public function url(): string
    {
        return Storage::disk(config('filesystems.media_disk', 'public'))->url($this->file_path);
    }

    public function thumbnailUrl(): string
    {
        $path = $this->thumbnail_path ?? $this->file_path;
        return Storage::disk(config('filesystems.media_disk', 'public'))->url($path);
    }

    public function displayTakenAt(): \Carbon\Carbon
    {
        return $this->exif_taken_at ?? $this->created_at;
    }

    public function hasTag(string $tag): bool
    {
        return in_array($tag, $this->tags ?? [], true);
    }

    // Scopes

    public function scopeFavorite(Builder $query): Builder
    {
        return $query->where('is_favorite', true);
    }

    public function scopeApprovedForUse(Builder $query): Builder
    {
        return $query->where('approved_for_use', true);
    }

    public function scopeWithTag(Builder $query, string $tag): Builder
    {
        return $query->whereRaw("tags @> ?::jsonb", [json_encode([$tag])]);
    }

    public function scopeByUploader(Builder $query, string $name): Builder
    {
        return $query->where('uploader_name', $name);
    }

    public function scopeOrderByTaken(Builder $query): Builder
    {
        return $query->orderBy('exif_taken_at')->orderBy('created_at');
    }

    public function scopeOrderByUploaded(Builder $query): Builder
    {
        return $query->orderBy('created_at');
    }
}
