<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\MediaFile;
use App\Models\MediaFileCrop;
use App\Models\Profile;
use App\Models\Project;
use App\Services\ImageCropService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipStream\ZipStream;

class MediaCropController extends Controller
{
    public function __construct(private readonly ImageCropService $cropService) {}

    private function currentProfile(Request $request, Project $project): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->where('organization_id', $project->organization_id)
            ->orderBy('id')
            ->first();

        abort_unless($profile, 403);

        return $profile;
    }

    private function authorizeDeliverable(Project $project, Deliverable $deliverable): void
    {
        abort_unless($deliverable->project_id === $project->id, 404);
    }

    private function canViewInternal(Profile $profile, Project $project, Deliverable $deliverable): bool
    {
        if ($profile->hasPermission('projects.manage')) {
            return true;
        }

        return $project->members()
            ->where('profile_id', $profile->id)
            ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
            ->exists();
    }

    public function store(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile): JsonResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($mediaFile->deliverable_id === $deliverable->id, 404);

        $data = $request->validate([
            'platform' => ['required', 'string', 'in:'.implode(',', array_keys(config('media_crops')))],
            'crop_x'   => ['required', 'integer', 'min:0'],
            'crop_y'   => ['required', 'integer', 'min:0'],
            'crop_w'   => ['required', 'integer', 'min:1'],
            'crop_h'   => ['required', 'integer', 'min:1'],
        ]);

        $preset = config("media_crops.{$data['platform']}");
        $disk = config('filesystems.media_disk', 'public');
        $sourcePath = Storage::disk($disk)->path($mediaFile->file_path);

        // Cropper.js getData() already returns coordinates in original image pixels — use directly
        $cropX = $data['crop_x'];
        $cropY = $data['crop_y'];
        $cropW = $data['crop_w'];
        $cropH = $data['crop_h'];

        $tempPath = $this->cropService->cropAndResize(
            $sourcePath,
            $cropX, $cropY, $cropW, $cropH,
            $preset['width'], $preset['height'],
        );

        $cropPath = 'media/'.$deliverable->organization_id.'/'.$deliverable->id.'/crops/'.$mediaFile->id.'/'.$data['platform'].'.jpg';

        try {
            Storage::disk($disk)->put($cropPath, file_get_contents($tempPath));
        } finally {
            if (file_exists($tempPath)) {
                @unlink($tempPath);
            }
        }

        $crop = MediaFileCrop::updateOrCreate(
            ['media_file_id' => $mediaFile->id, 'platform' => $data['platform']],
            [
                'organization_id' => $mediaFile->organization_id,
                'label'           => $preset['label'],
                'file_path'       => $cropPath,
                'width'           => $preset['width'],
                'height'          => $preset['height'],
                'crop_x'          => $cropX,
                'crop_y'          => $cropY,
                'crop_w'          => $cropW,
                'crop_h'          => $cropH,
            ]
        );

        // Auto-tag with the crop label
        $tags = $mediaFile->tags ?? [];
        if (! in_array($preset['label'], $tags, true)) {
            $tags[] = $preset['label'];
            $mediaFile->update(['tags' => $tags]);
        }

        return response()->json([
            'id'       => $crop->id,
            'platform' => $crop->platform,
            'label'    => $crop->platformLabel(),
            'url'      => $crop->url(),
            'width'    => $crop->width,
            'height'   => $crop->height,
            'tags'     => $tags,
        ]);
    }

    public function download(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile, MediaFileCrop $crop): void
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($crop->media_file_id === $mediaFile->id, 404);

        $disk = config('filesystems.media_disk', 'public');
        $path = Storage::disk($disk)->path($crop->file_path);

        response()->download($path, $crop->platform.'.jpg')->send();
        exit;
    }

    public function destroy(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile, MediaFileCrop $crop): JsonResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($crop->media_file_id === $mediaFile->id, 404);

        $disk = config('filesystems.media_disk', 'public');
        Storage::disk($disk)->delete($crop->file_path);
        $crop->delete();

        return response()->json(['success' => true]);
    }

    public function downloadAll(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile): void
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($mediaFile->deliverable_id === $deliverable->id, 404);

        $crops = $mediaFile->crops;
        $disk = config('filesystems.media_disk', 'public');
        $baseName = str($mediaFile->file_name)->beforeLast('.')->slug()->value() ?: Str::uuid();

        $response = response()->stream(function () use ($crops, $disk, $baseName) {
            $zip = new ZipStream(outputName: "{$baseName}-crops.zip");

            foreach ($crops as $crop) {
                $path = Storage::disk($disk)->path($crop->file_path);
                if (file_exists($path)) {
                    $zip->addFileFromPath($crop->platform.'.jpg', $path);
                }
            }

            $zip->finish();
        }, 200, [
            'Content-Type'        => 'application/zip',
            'Content-Disposition' => 'attachment; filename="'.$baseName.'-crops.zip"',
        ]);

        $response->send();
        exit;
    }
}
