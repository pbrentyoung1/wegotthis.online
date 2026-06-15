<?php

namespace App\Console\Commands;

use App\Models\MediaFile;
use App\Services\ImageCropService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackfillThumbnails extends Command
{
    protected $signature = 'media:backfill-thumbnails {--force : Regenerate thumbnails even if they already exist}';
    protected $description = 'Generate thumbnails for media files that are missing them';

    public function __construct(private readonly ImageCropService $cropService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $disk = config('filesystems.media_disk', 'public');

        $query = MediaFile::query();
        if (! $this->option('force')) {
            $query->whereNull('thumbnail_path');
        }

        $total = $query->count();

        if ($total === 0) {
            $this->info('No media files need thumbnails.');
            return self::SUCCESS;
        }

        $this->info("Generating thumbnails for {$total} file(s)...");
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $succeeded = 0;
        $failed = 0;

        $query->each(function (MediaFile $file) use ($disk, $bar, &$succeeded, &$failed) {
            $thumbTempPath = null;
            try {
                $sourcePath = Storage::disk($disk)->path($file->file_path);

                if (! file_exists($sourcePath)) {
                    $failed++;
                    $bar->advance();
                    return;
                }

                $thumbTempPath = $this->cropService->generateThumbnail($sourcePath, 600, 600);
                $thumbnailPath = 'media/'
                    . $file->organization_id . '/'
                    . $file->deliverable_id . '/thumbs/'
                    . basename($file->file_path);

                Storage::disk($disk)->put($thumbnailPath, file_get_contents($thumbTempPath));
                $file->update(['thumbnail_path' => $thumbnailPath]);
                $succeeded++;
            } catch (\Throwable $e) {
                $this->newLine();
                $this->warn("Failed [{$file->id}] {$file->file_name}: {$e->getMessage()}");
                $failed++;
            } finally {
                if ($thumbTempPath && file_exists($thumbTempPath)) {
                    @unlink($thumbTempPath);
                }
            }

            $bar->advance();
        });

        $bar->finish();
        $this->newLine();
        $this->info("Done. {$succeeded} succeeded, {$failed} failed.");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }
}
