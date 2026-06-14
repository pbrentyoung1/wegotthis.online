<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class MediaFileCrop extends Model
{
    protected $fillable = [
        'media_file_id', 'organization_id',
        'platform', 'label', 'file_path',
        'width', 'height',
        'crop_x', 'crop_y', 'crop_w', 'crop_h',
    ];

    public function mediaFile(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function url(): string
    {
        return Storage::disk(config('filesystems.media_disk', 'public'))->url($this->file_path);
    }

    public function platformLabel(): string
    {
        return config("media_crops.{$this->platform}.label", $this->label);
    }

    public function aspectRatio(): string
    {
        if ($this->height === 0) {
            return '?';
        }

        $gcd = $this->gcd($this->width, $this->height);

        return ($this->width / $gcd).':'.($this->height / $gcd);
    }

    private function gcd(int $a, int $b): int
    {
        return $b === 0 ? $a : $this->gcd($b, $a % $b);
    }
}
