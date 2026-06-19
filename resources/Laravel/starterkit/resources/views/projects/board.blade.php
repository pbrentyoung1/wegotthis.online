@extends("shared.base", ["title" => $project->title . " — Board"])

@section("styles")
    <style>
        @media (min-width: 768px) and (pointer: fine) {
            [data-board] [data-card] { cursor: grab; }
            [data-board].is-dragging [data-card] { cursor: grabbing; }
        }
        .board-card-ghost { opacity: 0.4; }
        .board-card-ghost .card { border-style: dashed; }
        .board-card-drag .card { transform: rotate(2deg); }
    </style>
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Projects", "title" => $project->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", [
                    "subtitle" => "Projects",
                    "subtitleUrl" => route("projects.index"),
                    "title" => $project->title,
                ])

                <div class="container-fluid">
                    @include("auth.partials.messages")
                    @include("projects.partials.view-switcher", [
                        "activeView" => "board",
                        "canManageProject" => $currentProfile->hasPermission("projects.manage"),
                        "canCloseoutProject" => $canManage,
                    ])

                    <div class="card min-h-[calc(100vh-250px)]">

                        {{-- Board toolbar --}}
                        <div class="card-header gap-base!">
                            <div class="flex items-center gap-3 min-w-0">
                                @if ($canManage)
                                    <span class="text-default-400 hidden items-center gap-1 text-xs md:inline-flex">
                                        <i class="iconify tabler--arrows-move"></i>Drag cards to move work forward
                                    </span>
                                    <span class="text-default-400 inline-flex items-center gap-1 text-xs md:hidden">
                                        <i class="iconify tabler--hand-swipe"></i>Swipe columns and use each card’s move action
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Board canvas --}}
                        <div class="card-body p-0">
                            <div class="bg-light/40 relative flex snap-x snap-mandatory items-stretch overflow-x-auto overscroll-x-contain scroll-smooth" @if ($canManage) data-board @endif>

                                @foreach ($columns as $statusValue => $column)
                                    @php($status = $column['status'])
                                    @php($deliverables = $column['deliverables'])

                                    <div class="border-default-300 w-[calc(100vw-3rem)] min-w-[calc(100vw-3rem)] snap-start border-e border-dashed sm:w-85 sm:min-w-84">

                                        {{-- Column header --}}
                                        <div class="flex items-center px-5 py-2.5">
                                            <div class="flex items-center gap-2 min-w-0">
                                                <span class="size-2 rounded-full {{ $status->dotClass() }} shrink-0"></span>
                                                <h5 class="truncate">{{ $status->value }}</h5>
                                                <span class="badge bg-default-200/70 text-default-500 rounded-full shrink-0" data-count>{{ $deliverables->count() }}</span>
                                            </div>
                                            @if ($currentProfile->hasPermission("projects.manage"))
                                                <a class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white shrink-0"
                                                   href="{{ route('deliverables.create', $project) }}"
                                                   title="Add deliverable">
                                                    <i class="iconify tabler--plus text-white"></i>
                                                </a>
                                            @endif
                                        </div>

                                        {{-- Scrollable column body --}}
                                        <div class="min-h-[55vh] px-5 pb-5 md:h-[calc(100vh-365px)]" data-simplebar="" data-simplebar-md="" data-board-column data-status="{{ $status->value }}">

                                            <div data-empty-state
                                                 class="{{ $deliverables->isEmpty() ? '' : 'hidden' }} mb-2.5 flex h-24 items-center justify-center rounded-lg border border-dashed border-default-200 text-center">
                                                <span class="text-xs text-default-400">{{ $canManage ? 'Drop deliverables here' : 'No deliverables' }}</span>
                                            </div>

                                            <ul class="space-y-2.5 min-h-[40px]" data-board-list data-status="{{ $status->value }}">
                                                @foreach ($deliverables as $deliverable)
                                                    @php($tasks = $deliverable->tasks)
                                                    @php($doneTasks = $tasks->filter(fn ($t) => in_array($t->status->value, ['Done', 'Canceled'])))
                                                    @php($blockedTasks = $tasks->filter(fn ($t) => $t->status->value === 'Blocked'))
                                                    @php($overdue = $deliverable->due_date && $deliverable->due_date->isPast() && !in_array($status->value, ['Published / Running', 'Ended']))

                                                    <li data-card
                                                        data-deliverable-id="{{ $deliverable->id }}"
                                                        data-current-status="{{ $status->value }}"
                                                        data-allowed-targets="{{ collect($status->boardTargets())->map->value->join("|") }}"
                                                        data-update-url="{{ route('projects.board.move', [$project, $deliverable], false) }}">
                                                        <div class="card border border-light hover:shadow-lg!">
                                                            <div class="card-body">

                                                                {{-- Type badge + attention + menu --}}
                                                                <div class="mb-2.5 flex items-center justify-between">
                                                                    <div>
                                                                        <span class="badge {{ $status->badgeClasses() }}">
                                                                            <i class="iconify tabler--circle-filled"></i>
                                                                            {{ $deliverable->deliverableType?->name ?: 'Deliverable' }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="flex items-center gap-1.5 ms-auto">
                                                                        @if ($deliverable->attention_state === 'Blocked' || $blockedTasks->isNotEmpty())
                                                                            <span class="badge bg-danger/10 text-danger">Blocked</span>
                                                                        @elseif ($deliverable->attention_state === 'Needs Attention')
                                                                            <span class="badge bg-warning/10 text-warning">Attention</span>
                                                                        @endif
                                                                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Options"
                                                                                    class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100"
                                                                                    type="button">
                                                                                <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                            </button>
                                                                            <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                                <div class="space-y-0.5">
                                                                                    <a class="dropdown-item" href="{{ route('deliverables.show', [$project, $deliverable]) }}">
                                                                                        <i class="iconify tabler--eye me-2"></i>Open deliverable
                                                                                    </a>
                                                                                    @if ($canManage)
                                                                                        @foreach ($status->boardTargets() as $targetStatus)
                                                                                            <form action="{{ route("projects.board.move", [$project, $deliverable]) }}" method="POST">
                                                                                                @csrf
                                                                                                @method("PATCH")
                                                                                                <input name="lifecycle_status" type="hidden" value="{{ $targetStatus->value }}" />
                                                                                                <button class="dropdown-item w-full text-start" type="submit">
                                                                                                    <i class="iconify tabler--arrow-right me-2"></i>Move to {{ $targetStatus->value }}
                                                                                                </button>
                                                                                            </form>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- Title --}}
                                                                <h5 class="mb-4">
                                                                    <a class="hover:text-primary" href="{{ route('deliverables.show', [$project, $deliverable]) }}">{{ $deliverable->title }}</a>
                                                                </h5>

                                                                {{-- Task checklist --}}
                                                                @if ($tasks->isNotEmpty())
                                                                    <div class="mb-4 space-y-1.5 border-t border-default-100 pt-3">
                                                                        @foreach ($tasks->take(4) as $task)
                                                                            <div class="flex items-start gap-2 text-sm">
                                                                                @switch($task->status->value)
                                                                                    @case('Done')
                                                                                    @case('Canceled')
                                                                                        <i class="iconify tabler--circle-check-filled text-success size-4 shrink-0 mt-px"></i>
                                                                                        <span class="text-default-400 line-through leading-snug truncate">{{ $task->title }}</span>
                                                                                        @break
                                                                                    @case('Blocked')
                                                                                        <i class="iconify tabler--circle-x text-danger size-4 shrink-0 mt-px"></i>
                                                                                        <span class="text-default-700 leading-snug truncate">{{ $task->title }}</span>
                                                                                        @break
                                                                                    @case('In Progress')
                                                                                        <i class="iconify tabler--circle-half-2 text-primary size-4 shrink-0 mt-px"></i>
                                                                                        <span class="text-default-700 leading-snug truncate">{{ $task->title }}</span>
                                                                                        @break
                                                                                    @case('Ready for Review')
                                                                                        <i class="iconify tabler--circle-check text-warning size-4 shrink-0 mt-px"></i>
                                                                                        <span class="text-default-700 leading-snug truncate">{{ $task->title }}</span>
                                                                                        @break
                                                                                    @default
                                                                                        <i class="iconify tabler--circle-dashed text-default-300 size-4 shrink-0 mt-px"></i>
                                                                                        <span class="text-default-500 leading-snug truncate">{{ $task->title }}</span>
                                                                                @endswitch
                                                                            </div>
                                                                        @endforeach
                                                                        @if ($tasks->count() > 4)
                                                                            <p class="text-xs text-default-400 ps-6">+{{ $tasks->count() - 4 }} more</p>
                                                                        @endif
                                                                    </div>
                                                                @endif

                                                                {{-- Footer: owner avatar + due date --}}
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center -space-x-1.5">
                                                                        @if ($deliverable->ownerProfile)
                                                                            @if ($deliverable->ownerProfile->avatar_url)
                                                                                <img alt="{{ $deliverable->ownerProfile->display_name }}"
                                                                                     title="{{ $deliverable->ownerProfile->display_name }}"
                                                                                     class="size-6 rounded-full object-cover ring-2 ring-white"
                                                                                     src="{{ $deliverable->ownerProfile->avatar_url }}"
                                                                                     draggable="false" />
                                                                            @else
                                                                                <span class="flex size-6 items-center justify-center rounded-full bg-primary/10 text-[10px] font-bold text-primary ring-2 ring-white"
                                                                                      title="{{ $deliverable->ownerProfile->display_name }}">
                                                                                    {{ str($deliverable->ownerProfile->display_name)->substr(0, 1)->upper() }}
                                                                                </span>
                                                                            @endif
                                                                        @else
                                                                            <span class="text-xs text-default-300">Unassigned</span>
                                                                        @endif
                                                                    </div>
                                                                    @if ($deliverable->due_date)
                                                                        <div class="flex items-center gap-1.5">
                                                                            <i class="iconify tabler--calendar-clock {{ $overdue ? 'text-danger' : 'text-default-400' }} text-lg"></i>
                                                                            <span class="text-sm font-medium {{ $overdue ? 'text-danger' : '' }}">{{ $deliverable->due_date->format('M j') }}</span>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                                {{-- Progress bar --}}
                                                                @if ($tasks->isNotEmpty())
                                                                    @php($pct = (int) round($doneTasks->count() / $tasks->count() * 100))
                                                                    <div class="mt-4">
                                                                        <div class="mb-1.5 flex items-center justify-between">
                                                                            <p class="text-2xs font-semibold text-default-400">{{ $doneTasks->count() }}/{{ $tasks->count() }} tasks</p>
                                                                            <p class="text-sm font-semibold">{{ $pct }}%</p>
                                                                        </div>
                                                                        <div class="h-1.25 w-full rounded-full bg-default-200">
                                                                            <div class="{{ $pct === 100 ? 'bg-success' : 'bg-primary' }} h-1.25 rounded-full" style="width: {{ $pct }}%"></div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if ($canManage && $status->boardTargets() !== [])
                                                                    <div class="mt-4 border-t border-default-100 pt-3 md:hidden">
                                                                        @foreach ($status->boardTargets() as $targetStatus)
                                                                            <form action="{{ route("projects.board.move", [$project, $deliverable]) }}" method="POST">
                                                                                @csrf
                                                                                @method("PATCH")
                                                                                <input name="lifecycle_status" type="hidden" value="{{ $targetStatus->value }}" />
                                                                                <button class="btn btn-sm w-full bg-light text-default-700" type="submit">
                                                                                    Move to {{ $targetStatus->value }}
                                                                                    <i class="iconify tabler--arrow-right ms-1"></i>
                                                                                </button>
                                                                            </form>
                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@if ($canManage)
    @section("scripts")
        @vite(["resources/js/pages/board.js"])
    @endsection
@endif
