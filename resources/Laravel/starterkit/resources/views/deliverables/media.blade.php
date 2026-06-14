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
                    <div class="card mb-base">
                        <div class="card-body py-3">
                            <form class="flex flex-wrap items-center gap-3" method="GET">
                                <div class="flex items-center gap-2">
                                    <label class="text-sm text-default-500 shrink-0">Sort:</label>
                                    <select class="form-select form-select-sm w-40" name="sort" onchange="this.form.submit()">
                                        <option value="taken" @selected($sort === 'taken')>Time taken</option>
                                        <option value="uploaded" @selected($sort === 'uploaded')>Upload time</option>
                                        <option value="uploader" @selected($sort === 'uploader')>Uploader</option>
                                        <option value="favorites" @selected($sort === 'favorites')>Favorites first</option>
                                    </select>
                                </div>

                                @if ($uploaders->isNotEmpty())
                                    <select class="form-select form-select-sm w-40" name="uploader" onchange="this.form.submit()">
                                        <option value="">All uploaders</option>
                                        @foreach ($uploaders as $u)
                                            <option value="{{ $u }}" @selected(request('uploader') === $u)>{{ $u }}</option>
                                        @endforeach
                                    </select>
                                @endif

                                <label class="flex items-center gap-1.5 text-sm cursor-pointer">
                                    <input class="form-checkbox" name="favorites_only" type="checkbox" value="1" @checked(request('favorites_only')) onchange="this.form.submit()" />
                                    Favorites only
                                </label>
                                <label class="flex items-center gap-1.5 text-sm cursor-pointer">
                                    <input class="form-checkbox" name="approved_only" type="checkbox" value="1" @checked(request('approved_only')) onchange="this.form.submit()" />
                                    Approved only
                                </label>

                                <div class="ms-auto flex items-center gap-2">
                                    <span class="text-default-400 text-sm">{{ $mediaFiles->count() }} {{ Str::plural('photo', $mediaFiles->count()) }}</span>
                                    @if ($mediaFiles->isNotEmpty())
                                        <a class="btn btn-sm bg-primary text-white hover:bg-primary-hover" href="{{ route('deliverables.media.download', [$project, $deliverable]) }}">
                                            <i class="iconify tabler--download me-1 size-4"></i>Download all
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

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
                                            src="{{ $mediaFile->url() }}"
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

    {{-- Media detail modal --}}
    <div class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm" id="media-modal" onclick="if(event.target===this)closeMediaDetail()">
        <div class="absolute inset-y-0 right-0 w-full max-w-2xl bg-white dark:bg-default-800 shadow-xl overflow-y-auto" id="media-panel">
            <div class="flex items-center justify-between p-4 border-b border-default-200">
                <h4 class="font-semibold" id="modal-filename">Photo</h4>
                <button class="btn btn-icon size-8 bg-light" onclick="closeMediaDetail()">
                    <i class="iconify tabler--x size-4"></i>
                </button>
            </div>
            <div id="modal-body" class="p-4 space-y-4">
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
