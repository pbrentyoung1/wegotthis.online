<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\MediaFile;
use App\Services\ExifExtractor;
use App\Services\ImageConversionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PhotoUploadController extends Controller
{
    public function __construct(
        private readonly ImageConversionService $converter,
        private readonly ExifExtractor $exifExtractor,
    ) {}

    public function show(string $slug): View
    {
        $deliverable = Deliverable::where('upload_slug', $slug)->with('project')->firstOrFail();

        if (! $deliverable->upload_open || ($deliverable->upload_closes_at && $deliverable->upload_closes_at->isPast())) {
            return view('upload.closed', compact('deliverable'));
        }

        return view('upload.show', compact('deliverable'));
    }

    public function store(Request $request, string $slug): JsonResponse
    {
        $deliverable = Deliverable::where('upload_slug', $slug)->with('project')->firstOrFail();

        if (! $deliverable->upload_open || ($deliverable->upload_closes_at && $deliverable->upload_closes_at->isPast())) {
            return response()->json(['error' => 'Submissions are closed for this event.'], 410);
        }

        // Rate limit: 50 uploads per hour per IP
        $key = 'photo-upload:'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 50)) {
            return response()->json(['error' => 'Too many uploads. Please wait before uploading more.'], 429);
        }
        RateLimiter::hit($key, 3600);

        $request->validate([
            'file' => ['required', 'file', 'mimes:jpeg,jpg,png,webp,heic,heif', 'max:20480'],
        ]);

        $uploadedFile = $request->file('file');
        $tempPath = $uploadedFile->getRealPath();
        $originalName = $uploadedFile->getClientOriginalName();
        $originalMime = $uploadedFile->getMimeType();

        $convertedTempPath = null;
        try {
            $normalized = $this->converter->normalize($tempPath, $originalMime);

            if ($normalized['temp']) {
                $convertedTempPath = $normalized['path'];
            }

            $normalizedPath = $normalized['path'];
            $normalizedMime = $normalized['mime'];

            // Validate the file is actually a readable image
            $imageSize = @getimagesize($normalizedPath);
            if ($imageSize === false) {
                return response()->json(['error' => 'File could not be opened as an image.'], 422);
            }

            // Extract EXIF before orientate (orientate may strip it)
            $exif = $this->exifExtractor->extract($normalizedPath);

            // Store file with a server-generated name to prevent path traversal
            $ext = $normalizedMime === 'image/png' ? 'png' : 'jpg';
            $storagePath = 'media/'.$deliverable->organization_id.'/'.$deliverable->id.'/'.Str::uuid().'.'.$ext;

            $disk = config('filesystems.media_disk', 'public');
            Storage::disk($disk)->put($storagePath, file_get_contents($normalizedPath));

            MediaFile::create(array_merge($exif, [
                'organization_id' => $deliverable->organization_id,
                'deliverable_id'  => $deliverable->id,
                'uploader_name'   => $request->input('uploader_name'),
                'uploader_ip'     => $request->ip(),
                'file_path'       => $storagePath,
                'file_name'       => $originalName,
                'file_size'       => filesize($normalizedPath),
                'mime_type'       => $normalizedMime,
                'tags'            => [],
            ]));

        } finally {
            if ($convertedTempPath && file_exists($convertedTempPath)) {
                @unlink($convertedTempPath);
            }
        }

        return response()->json(['success' => true, 'filename' => $originalName]);
    }
}
