@php($activeView = $activeView ?? "list")
@php($projectViews = [
    "list" => ["route" => route("projects.show", $project), "icon" => "tabler--layout-dashboard", "label" => "Overview"],
])
@if (($canViewInternalProject ?? true))
    @php($projectViews += [
        "board" => ["route" => route("projects.board", $project), "icon" => "tabler--layout-kanban", "label" => "Board"],
        "calendar" => ["route" => route("projects.calendar", $project), "icon" => "tabler--calendar", "label" => "Calendar"],
    ])
@endif
<div class="mb-5">
    <nav
        class="relative inline-grid w-full isolate overflow-hidden rounded-full border border-default-200 bg-light/80 p-1 shadow-sm sm:w-auto"
        style="grid-template-columns: repeat({{ count($projectViews) }}, minmax(0, 1fr)); --project-view-index: {{ array_search($activeView, array_keys($projectViews), true) }}; --project-view-count: {{ count($projectViews) }};"
        aria-label="Project views"
        data-project-view-switcher
    >
        <span
            class="pointer-events-none absolute inset-y-1 left-1 -z-0 rounded-full bg-white shadow-sm ring-1 ring-black/5 transition-transform duration-300 ease-out motion-reduce:transition-none"
            style="width: calc((100% - 0.5rem) / var(--project-view-count)); transform: translateX(calc(var(--project-view-index) * 100%));"
            data-project-view-indicator
        ></span>
        @foreach ($projectViews as $view => $item)
            <a
                class="group {{ $activeView === $view ? "text-primary" : "text-default-500 hover:text-default-700" }} relative z-10 inline-flex min-h-10 items-center justify-center gap-2 rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200"
                href="{{ $item["route"] }}"
                data-project-view-link
                data-project-view-index="{{ $loop->index }}"
                @if ($activeView === $view) aria-current="page" @endif
            >
                <i class="iconify {{ $item["icon"] }} text-lg transition-transform duration-200 group-hover:scale-105"></i>
                <span>{{ $item["label"] }}</span>
            </a>
        @endforeach
    </nav>
</div>
