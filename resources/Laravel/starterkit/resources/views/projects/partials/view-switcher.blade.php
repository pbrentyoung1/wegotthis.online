@php($activeView = $activeView ?? "list")
@php($projectViews = [
    "list" => ["route" => route("projects.show", $project), "icon" => "tabler--list", "label" => "List"],
])
@if (($canViewInternalProject ?? true))
    @php($projectViews += [
        "board" => ["route" => route("projects.board", $project), "icon" => "tabler--layout-kanban", "label" => "Board"],
        "calendar" => ["route" => route("projects.calendar", $project), "icon" => "tabler--calendar", "label" => "Calendar"],
    ])
@endif
<div class="mb-5 flex flex-wrap items-center justify-between gap-3">
    <div class="inline-grid w-full rounded-xl bg-light p-1 sm:w-auto" style="grid-template-columns: repeat({{ count($projectViews) }}, minmax(0, 1fr));" aria-label="Project views">
        @foreach ($projectViews as $view => $item)
            <a
                class="{{ $activeView === $view ? "bg-white text-primary shadow-sm" : "text-default-500 hover:text-primary" }} inline-flex min-h-10 items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold transition"
                href="{{ $item["route"] }}"
            >
                <i class="iconify {{ $item["icon"] }} text-lg"></i>
                {{ $item["label"] }}
            </a>
        @endforeach
    </div>

    <div class="flex w-full flex-wrap gap-2 sm:w-auto sm:justify-end">
        @if (($canManageProject ?? false))
            <a class="btn bg-primary text-white hover:bg-primary-hover" href="{{ route("deliverables.create", $project) }}">
                <i class="iconify tabler--plus me-1"></i>Add deliverable
            </a>
        @endif
        @if (($canCloseoutProject ?? false))
            <a class="btn bg-light text-default-600 hover:text-primary" href="{{ route("projects.closeout", $project) }}">
                <i class="iconify tabler--archive me-1"></i>Closeout
            </a>
        @endif
    </div>
</div>
