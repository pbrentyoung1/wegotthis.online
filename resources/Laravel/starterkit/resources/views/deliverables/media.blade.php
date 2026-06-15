@extends("shared.base", ["title" => $deliverable->title . " — Photos"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Photos", "title" => $deliverable->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", [
                    "subtitle" => $project->name,
                    "subtitleUrl" => route("projects.show", $project),
                    "title" => $deliverable->title . " — Photos",
                ])

                <div class="container-fluid">

                    {{-- Back link + Upload link card --}}
                    <div class="mb-5 flex flex-wrap items-start justify-between gap-4">
                        <a class="text-primary text-sm hover:underline" href="{{ route('deliverables.show', [$project, $deliverable]) }}">
                            <i class="iconify tabler--arrow-left me-1"></i>Back to deliverable
                        </a>

                        @if ($deliverable->upload_slug)
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-default-500">Upload link:</span>
                                <code class="text-sm bg-light px-2 py-1 rounded">{{ $deliverable->uploadUrl() }}</code>
                                <button
                                    class="btn btn-sm bg-light text-default-700"
                                    onclick="navigator.clipboard.writeText('{{ $deliverable->uploadUrl() }}').then(() => this.textContent = 'Copied!')"
                                >Copy</button>
                                @if ($canManage)
                                    <form action="{{ route('deliverables.media.toggle-open', [$project, $deliverable]) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <button class="btn btn-sm {{ $deliverable->uploadIsOpen() ? 'bg-warning/10 text-warning' : 'bg-success/10 text-success' }}">
                                            {{ $deliverable->uploadIsOpen() ? 'Close submissions' : 'Open submissions' }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </div>

                    {{-- Toolbar --}}
                    <form class="card mb-base" method="GET">
                        <div class="card-body py-3">
                            <div class="flex flex-wrap items-center gap-3">
                                {{-- Sort --}}
                                <div class="flex items-center gap-2 shrink-0">
                                    <label class="text-sm text-default-500 shrink-0">Sort</label>
                                    <div class="w-36">
                                        <select class="form-select form-select-sm" name="sort" onchange="this.form.submit()">
                                            <option value="taken" @selected($sort === 'taken')>Time taken</option>
                                            <option value="uploaded" @selected($sort === 'uploaded')>Upload time</option>
                                            <option value="uploader" @selected($sort === 'uploader')>Uploader</option>
                                            <option value="favorites" @selected($sort === 'favorites')>Favorites first</option>
                                        </select>
                                    </div>
                                </div>

                                @if ($uploaders->isNotEmpty())
                                    <div class="w-36 shrink-0">
                                        <select class="form-select form-select-sm" name="uploader" onchange="this.form.submit()">
                                            <option value="">All uploaders</option>
                                            @foreach ($uploaders as $u)
                                                <option value="{{ $u }}" @selected(request('uploader') === $u)>{{ $u }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                @if ($allTags->isNotEmpty())
                                    <div class="w-36 shrink-0">
                                        <select class="form-select form-select-sm" name="tag" onchange="this.form.submit()">
                                            <option value="">All tags</option>
                                            @foreach ($allTags as $t)
                                                <option value="{{ $t }}" @selected(request('tag') === $t)>{{ $t }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <label class="flex items-center gap-1.5 text-sm text-default-600 cursor-pointer select-none shrink-0">
                                    <input class="form-checkbox" name="favorites_only" type="checkbox" value="1" @checked(request('favorites_only')) onchange="this.form.submit()" />
                                    Favorites
                                </label>
                                <label class="flex items-center gap-1.5 text-sm text-default-600 cursor-pointer select-none shrink-0">
                                    <input class="form-checkbox" name="approved_only" type="checkbox" value="1" @checked(request('approved_only')) onchange="this.form.submit()" />
                                    Approved
                                </label>

                                <div class="ms-auto flex items-center gap-3 shrink-0">
                                    <span class="text-sm text-default-400">{{ $mediaFiles->count() }} {{ Str::plural('photo', $mediaFiles->count()) }}</span>
                                    @if ($mediaFiles->isNotEmpty())
                                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                            <button type="button" class="btn btn-sm bg-primary text-white hover:bg-primary-hover inline-flex items-center gap-1.5" aria-expanded="false" aria-haspopup="menu">
                                                <i class="iconify tabler--download size-4"></i>Download all
                                                <i class="iconify tabler--chevron-down size-3 opacity-70"></i>
                                            </button>
                                            <div class="hs-dropdown-menu min-w-44" role="menu">
                                                <a class="dropdown-item" href="{{ route('deliverables.media.download', [$project, $deliverable]) }}?include=originals">
                                                    <i class="iconify tabler--photo me-2 text-base"></i>Originals
                                                </a>
                                                <a class="dropdown-item" href="{{ route('deliverables.media.download', [$project, $deliverable]) }}?include=crops">
                                                    <i class="iconify tabler--scissors me-2 text-base"></i>Crops only
                                                </a>
                                                <a class="dropdown-item" href="{{ route('deliverables.media.download', [$project, $deliverable]) }}?include=both">
                                                    <i class="iconify tabler--stack me-2 text-base"></i>Originals + Crops
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    @if ($mediaFiles->isEmpty())
                        <div class="card">
                            <div class="card-body py-16 text-center">
                                <i class="iconify tabler--photo text-default-300 mb-3 size-12"></i>
                                <p class="font-semibold">No photos yet</p>
                                <p class="text-default-400 mt-1 text-sm">Share the upload link and photos will appear here.</p>
                                @if ($deliverable->upload_slug)
                                    <p class="mt-4 text-sm">
                                        <span class="text-default-500">Upload link: </span>
                                        <a class="text-primary hover:underline" href="{{ $deliverable->uploadUrl() }}" target="_blank">{{ $deliverable->uploadUrl() }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @else
                        {{-- Photo grid --}}
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5" id="media-grid">
                            @foreach ($mediaFiles as $mediaFile)
                                <div class="group relative overflow-hidden rounded-xl bg-default-100 cursor-pointer"
                                     data-media-id="{{ $mediaFile->id }}"
                                     onclick="openMediaDetail({{ $mediaFile->id }})"
                                >
                                    <div class="aspect-square overflow-hidden">
                                        <img
                                            alt="{{ $mediaFile->file_name }}"
                                            class="size-full object-cover transition-transform group-hover:scale-105"
                                            loading="lazy"
                                            src="{{ $mediaFile->thumbnailUrl() }}"
                                        />
                                    </div>
                                    {{-- Favorite toggle --}}
                                    <button
                                        class="absolute top-2 right-2 size-8 rounded-full bg-white/80 backdrop-blur flex items-center justify-center hover:bg-white transition-colors"
                                        onclick="event.stopPropagation(); toggleFavorite({{ $mediaFile->id }}, this)"
                                        title="{{ $mediaFile->is_favorite ? 'Remove from favorites' : 'Add to favorites' }}"
                                    >
                                        <i class="iconify {{ $mediaFile->is_favorite ? 'tabler--star-filled text-warning' : 'tabler--star text-default-400' }} size-4"></i>
                                    </button>
                                    {{-- Approved badge --}}
                                    @if ($mediaFile->approved_for_use)
                                        <span class="absolute top-2 left-2 rounded-full bg-success/90 px-1.5 py-0.5 text-[10px] font-semibold text-white">Approved</span>
                                    @endif
                                    {{-- Crops badge --}}
                                    @if ($mediaFile->crops->isNotEmpty())
                                        <span class="crop-badge absolute bottom-2 right-2 rounded-full bg-black/60 px-1.5 py-0.5 text-[10px] font-semibold text-white flex items-center gap-1">
                                            <i class="iconify tabler--scissors size-3"></i>{{ $mediaFile->crops->count() }}
                                        </span>
                                    @endif
                                    {{-- Caption/uploader overlay --}}
                                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent p-2 pt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                        @if ($mediaFile->uploader_name)
                                            <p class="text-white text-xs font-medium truncate">{{ $mediaFile->uploader_name }}</p>
                                        @endif
                                        <p class="text-white/70 text-[10px]">{{ $mediaFile->displayTakenAt()->format('M j, g:i A') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    {{-- Crop modal --}}
    <div id="crop-modal" style="display:none;position:fixed;inset:0;z-index:60;background:#0a0a0a;flex-direction:column">
        <div style="display:flex;align-items:center;gap:1rem;padding:.75rem 1rem;flex-shrink:0;border-bottom:1px solid rgba(255,255,255,0.1)">
            <p class="text-white font-medium text-sm" id="crop-modal-label" style="flex:1;margin:0"></p>
            <button type="button" class="btn btn-sm bg-white/10 text-white hover:bg-white/20" onclick="zoomCrop(0.1)">
                <i class="iconify tabler--zoom-in me-1 size-4"></i>Zoom in
            </button>
            <button type="button" class="btn btn-sm bg-white/10 text-white hover:bg-white/20" onclick="zoomCrop(-0.1)">
                <i class="iconify tabler--zoom-out me-1 size-4"></i>Zoom out
            </button>
            <button type="button" class="btn btn-sm bg-primary text-white hover:bg-primary-hover" onclick="saveCrop()">Save crop</button>
            <button type="button" class="btn btn-sm bg-white/10 text-white hover:bg-white/20" onclick="cancelCrop()">Cancel</button>
        </div>
        <div id="crop-container" style="flex:1;min-height:0;position:relative;overflow:hidden;padding:1rem">
            <img id="crop-image-el" src="" alt="" crossorigin="anonymous" style="display:block;max-width:100%;max-height:100%" />
        </div>
    </div>

    {{-- Lightbox modal --}}
    <div class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/95" id="lightbox-modal" onclick="if(event.target===this)closeLightbox()">
        <button class="absolute top-4 right-4 size-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white" onclick="closeLightbox()">
            <i class="iconify tabler--x size-5"></i>
        </button>
        <img id="lightbox-img" src="" alt="" class="max-h-screen max-w-full object-contain p-4" />
    </div>

    {{-- Media detail modal --}}
    <div class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-stretch justify-end p-4" id="media-modal" onclick="if(event.target===this)closeMediaDetail()">
        <div class="w-full max-w-2xl bg-white dark:bg-default-800 shadow-xl flex flex-col rounded-2xl overflow-hidden" id="media-panel">
            <div class="flex items-center justify-between p-4 border-b border-default-200 shrink-0">
                <h4 class="font-semibold" id="modal-filename">Photo</h4>
                <button class="btn btn-icon size-8 bg-light" onclick="closeMediaDetail()">
                    <i class="iconify tabler--x size-4"></i>
                </button>
            </div>
            <div id="modal-body" class="p-4 space-y-4 overflow-y-auto flex-1 min-h-0">
                {{-- Loaded via JS --}}
            </div>
        </div>
    </div>

    @include("shared.partials.customizer")

    {{-- Inline media detail data for JS --}}
    <script>
        const mediaData = @json($mediaJson);
        const canManage = @json($canManage);
        const csrfToken = @json(csrf_token());
        const cropPresets = @json(config('media_crops'));
    </script>
    @vite('resources/js/pages/photo-crop.js')
@endsection
