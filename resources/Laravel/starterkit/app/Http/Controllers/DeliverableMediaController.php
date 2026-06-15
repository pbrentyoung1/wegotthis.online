<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\MediaFile;
use App\Models\Profile;
use App\Models\Project;
use App\Services\MediaFileMetadataWriter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use ZipStream\ZipStream;

class DeliverableMediaController extends Controller
{
    public function __construct(private readonly MediaFileMetadataWriter $metadataWriter) {}

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

        $isInternalMember = $project->members()
            ->where('profile_id', $profile->id)
            ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
            ->exists();

        $isAssignedInternally = in_array($profile->id, [
            $deliverable->owner_profile_id,
            $deliverable->internal_reviewer_profile_id,
        ], true);

        return $isInternalMember || $isAssignedInternally;
    }

    public function index(Request $request, Project $project, Deliverable $deliverable): View
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);

        $query = $deliverable->mediaFiles()->with('crops');

        // Sort
        $sort = $request->input('sort', 'taken');
        match ($sort) {
            'uploaded'  => $query->orderByUploaded(),
            'uploader'  => $query->orderBy('uploader_name')->orderByUploaded(),
            'favorites' => $query->orderByDesc('is_favorite')->orderByTaken(),
            default     => $query->orderByTaken(),
        };

        // Filter
        if ($uploader = $request->input('uploader')) {
            $query->byUploader($uploader);
        }
        if ($tag = $request->input('tag')) {
            $query->withTag($tag);
        }
        if ($request->boolean('favorites_only')) {
            $query->favorite();
        }
        if ($request->boolean('approved_only')) {
            $query->approvedForUse();
        }

        $mediaFiles = $query->get();
        $uploaders = $deliverable->mediaFiles()->reorder()->distinct()->pluck('uploader_name')->filter()->sort()->values();
        $allTags = $deliverable->mediaFiles()->reorder()->pluck('tags')->flatten()->unique()->sort()->values();
        $canManage = $currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id;

        // Pre-build the JS data structure in PHP to avoid Blade parser issues with nested closures in @json()
        $mediaJson = $mediaFiles->keyBy('id')->map(function ($f) use ($project, $deliverable, $canManage) {
            return [
                'id'                => $f->id,
                'url'               => $f->url(),
                'thumbnail_url'     => $f->thumbnailUrl(),
                'file_name'         => $f->file_name,
                'uploader_name'     => $f->uploader_name,
                'is_favorite'       => $f->is_favorite,
                'approved_for_use'  => $f->approved_for_use,
                'caption'           => $f->caption,
                'notes'             => $f->notes,
                'tags'              => $f->tags ?? [],
                'exif_taken_at'     => $f->exif_taken_at?->format('Y-m-d H:i'),
                'exif_device_make'  => $f->exif_device_make,
                'exif_device_model' => $f->exif_device_model,
                'exif_width'        => $f->exif_width,
                'exif_height'       => $f->exif_height,
                'exif_aperture'     => $f->exif_aperture,
                'exif_shutter_speed'=> $f->exif_shutter_speed,
                'exif_iso'          => $f->exif_iso,
                'crops'             => $f->crops->map(fn ($c) => [
                    'id'       => $c->id,
                    'platform' => $c->platform,
                    'label'    => $c->platformLabel(),
                    'url'      => $c->url(),
                    'width'    => $c->width,
                    'height'   => $c->height,
                ])->values()->all(),
                'update_url'   => route('deliverables.media.update', [$project, $deliverable, $f], false),
                'favorite_url' => route('deliverables.media.favorite', [$project, $deliverable, $f], false),
                'delete_url'   => $canManage ? route('deliverables.media.destroy', [$project, $deliverable, $f], false) : null,
                'crop_url'     => $canManage ? route('deliverables.media.crops.store', [$project, $deliverable, $f], false) : null,
            ];
        })->all();

        return view('deliverables.media', compact(
            'currentProfile', 'project', 'deliverable',
            'mediaFiles', 'uploaders', 'allTags',
            'sort', 'canManage', 'mediaJson',
        ));
    }

    public function update(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($mediaFile->deliverable_id === $deliverable->id, 404);

        $data = $request->validate([
            'caption'          => ['nullable', 'string', 'max:1000'],
            'notes'            => ['nullable', 'string', 'max:1000'],
            'tags'             => ['nullable', 'array'],
            'tags.*'           => ['string', 'max:50'],
            'is_favorite'      => ['boolean'],
            'approved_for_use' => ['boolean'],
        ]);

        $mediaFile->update($data);

        return back()->with('status', 'Photo updated.');
    }

    public function toggleFavorite(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile): JsonResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);
        abort_unless($mediaFile->deliverable_id === $deliverable->id, 404);

        $mediaFile->update(['is_favorite' => ! $mediaFile->is_favorite]);

        return response()->json(['is_favorite' => $mediaFile->is_favorite]);
    }

    public function destroy(Request $request, Project $project, Deliverable $deliverable, MediaFile $mediaFile): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($currentProfile->hasPermission('projects.manage'), 403);
        abort_unless($mediaFile->deliverable_id === $deliverable->id, 404);

        $disk = config('filesystems.media_disk', 'public');
        Storage::disk($disk)->delete($mediaFile->file_path);

        foreach ($mediaFile->crops as $crop) {
            Storage::disk($disk)->delete($crop->file_path);
        }

        $mediaFile->delete();

        return back()->with('status', 'Photo deleted.');
    }

    public function toggleOpen(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($currentProfile->hasPermission('projects.manage'), 403);

        $deliverable->update(['upload_open' => ! $deliverable->upload_open]);

        return back()->with('status', $deliverable->upload_open ? 'Submissions opened.' : 'Submissions closed.');
    }

    public function download(Request $request, Project $project, Deliverable $deliverable): void
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($this->canViewInternal($currentProfile, $project, $deliverable), 403);

        $ids = $request->input('ids', []);
        $query = $deliverable->mediaFiles();

        if (! empty($ids)) {
            $query->whereIn('id', $ids);
        }

        $files = $query->with('crops')->get();
        $disk = config('filesystems.media_disk', 'public');
        $safeName = str($deliverable->title)->slug()->value();
        $include = $request->input('include', 'originals'); // originals | crops | both

        $response = response()->stream(function () use ($files, $disk, $safeName, $include) {
            $zip = new ZipStream(outputName: "{$safeName}-photos.zip");

            foreach ($files as $mediaFile) {
                $originalName = $mediaFile->file_name ?: basename($mediaFile->file_path);

                // Add the original photo
                if ($include !== 'crops') {
                    $path = Storage::disk($disk)->path($mediaFile->file_path);

                    if (file_exists($path)) {
                        $annotatedPath = $this->metadataWriter->write($mediaFile, $path);
                        $isTemp = $annotatedPath !== $path;

                        $zip->addFileFromPath(fileName: $originalName, path: $annotatedPath);

                        if ($isTemp && file_exists($annotatedPath)) {
                            @unlink($annotatedPath);
                        }
                    }
                }

                // Add crop files with platform prefix
                if ($include !== 'originals') {
                    foreach ($mediaFile->crops as $crop) {
                        $cropPath = Storage::disk($disk)->path($crop->file_path);

                        if (! file_exists($cropPath)) {
                            continue;
                        }

                        $ext = pathinfo($originalName, PATHINFO_EXTENSION) ?: 'jpg';
                        $base = pathinfo($originalName, PATHINFO_FILENAME);
                        $cropName = $crop->platform.'-'.$base.'.'.$ext;

                        $zip->addFileFromPath(fileName: $cropName, path: $cropPath);
                    }
                }
            }

            $zip->finish();
        }, 200, [
            'Content-Type'        => 'application/zip',
            'Content-Disposition' => 'attachment; filename="'.$safeName.'-photos.zip"',
        ]);

        $response->send();
        exit;
    }
}
