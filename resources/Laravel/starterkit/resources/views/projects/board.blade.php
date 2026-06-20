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
        #board-deliverable-dialog::backdrop { background: rgb(15 23 42 / 0.48); backdrop-filter: blur(3px); }
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
                            @if ($currentProfile->hasPermission("projects.manage"))
                                <a class="bg-primary ms-auto inline-flex size-9 items-center justify-center rounded-full text-white shrink-0"
                                   href="{{ route('deliverables.create', $project) }}"
                                   title="Add deliverable">
                                    <i class="iconify tabler--plus text-white text-lg"></i>
                                </a>
                            @endif
                            <div class="hidden w-full rounded-xl bg-danger/10 px-4 py-3 text-sm text-danger" data-board-alert role="alert"></div>
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
                                                        data-owner-ready="{{ $deliverable->owner_profile_id ? 'true' : 'false' }}"
                                                        data-due-ready="{{ $deliverable->due_date ? 'true' : 'false' }}"
                                                        data-edit-url="{{ route('deliverables.edit', [$project, $deliverable]) }}"
                                                        data-update-url="{{ route('projects.board.move', [$project, $deliverable], false) }}">
                                                        <div
                                                            class="card border border-light hover:shadow-lg! focus-visible:ring-primary/30 focus-visible:ring-4 focus-visible:outline-none"
                                                            data-detail-trigger="{{ $deliverable->id }}"
                                                            role="button"
                                                            tabindex="0"
                                                            aria-label="View details for {{ $deliverable->title }}"
                                                        >
                                                            <div class="card-body">

                                                                {{-- Type badge + attention + menu --}}
                                                                <div class="mb-2.5 flex items-center justify-between">
                                                                    <div>
                                                                        <span class="badge {{ $status->badgeClasses() }}">
                                                                            <i class="iconify tabler--circle-filled"></i>
                                                                            <span data-card-type>{{ $deliverable->deliverableType?->name ?: 'Deliverable' }}</span>
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
                                                                                    <button class="dropdown-item w-full text-start" data-detail-trigger="{{ $deliverable->id }}" type="button">
                                                                                        <i class="iconify tabler--eye me-2"></i>View details
                                                                                    </button>
                                                                                    @if ($canManage)
                                                                                        @foreach ($status->boardTargets() as $targetStatus)
                                                                                            <form action="{{ route("projects.board.move", [$project, $deliverable]) }}" data-board-move-form method="POST">
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
                                                                    <button class="text-start hover:text-primary" data-card-title data-detail-trigger="{{ $deliverable->id }}" type="button">{{ $deliverable->title }}</button>
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
                                                                            <span class="text-xs text-default-300" data-card-owner>Unassigned</span>
                                                                        @endif
                                                                    </div>
                                                                    @if ($deliverable->due_date)
                                                                        <div class="flex items-center gap-1.5">
                                                                            <i class="iconify tabler--calendar-clock {{ $overdue ? 'text-danger' : 'text-default-400' }} text-lg"></i>
                                                                            <span class="text-sm font-medium {{ $overdue ? 'text-danger' : '' }}" data-card-due>{{ $deliverable->due_date->format('M j') }}</span>
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
                                                                            <form action="{{ route("projects.board.move", [$project, $deliverable]) }}" data-board-move-form method="POST">
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

                    @foreach ($project->deliverables as $deliverable)
                        @php($detailTasks = $deliverable->tasks)
                        @php($detailDoneTasks = $detailTasks->filter(fn ($task) => in_array($task->status->value, ["Done", "Canceled"], true)))
                        <template id="board-deliverable-detail-{{ $deliverable->id }}">
                            <div data-deliverable-workspace="{{ $deliverable->id }}">
                                <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                                    <div class="inline-flex rounded-full bg-light p-1">
                                        <button class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-primary shadow-sm" data-workspace-panel-button="overview" type="button">Overview</button>
                                        @if ($currentProfile->hasPermission("projects.manage"))
                                            <button class="rounded-full px-4 py-2 text-sm font-semibold text-default-500" data-workspace-panel-button="edit" type="button">Edit</button>
                                        @endif
                                        @if ($canManage)
                                            <button class="rounded-full px-4 py-2 text-sm font-semibold text-default-500" data-workspace-panel-button="advanced" type="button">Advanced</button>
                                        @endif
                                    </div>
                                    <span class="hidden text-sm font-medium text-success" data-save-success></span>
                                </div>

                                <div class="space-y-6" data-workspace-panel="overview">
                                    <div>
                                        <div class="mb-3 flex flex-wrap items-center gap-2">
                                            <span class="badge {{ $deliverable->lifecycle_status->badgeClasses() }}">{{ $deliverable->lifecycle_status->value }}</span>
                                            <span class="badge bg-light text-default-600" data-detail-type>{{ $deliverable->deliverableType?->name ?: "Deliverable" }}</span>
                                            <span class="{{ $deliverable->attention_state === "On Track" ? "hidden " : "" }}badge bg-warning/10 text-warning" data-detail-attention>{{ $deliverable->attention_state }}</span>
                                        </div>
                                        <h3 class="text-xl font-semibold" data-detail-title>{{ $deliverable->title }}</h3>
                                    </div>

                                    <dl class="grid grid-cols-2 gap-4 text-sm sm:grid-cols-4">
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Owner</dt>
                                            <dd class="mt-1 font-medium" data-detail-owner>{{ $deliverable->ownerProfile?->display_name ?: "Unassigned" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Due</dt>
                                            <dd class="mt-1 font-medium" data-detail-due>{{ $deliverable->due_date?->format("M j, Y") ?: "Not planned" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Publish</dt>
                                            <dd class="mt-1 font-medium" data-detail-publish>{{ $deliverable->publish_date?->format("M j, Y") ?: "Not planned" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Tasks</dt>
                                            <dd class="mt-1 font-medium">{{ $detailDoneTasks->count() }}/{{ $detailTasks->count() }} complete</dd>
                                        </div>
                                    </dl>

                                    <div>
                                        <h4 class="mb-2 font-semibold">Brief</h4>
                                        @if ($deliverable->description)
                                            <x-rich-text class="text-default-600" :value="$deliverable->description" />
                                        @else
                                            <p class="text-default-400 text-sm">No deliverable brief has been added yet.</p>
                                        @endif
                                    </div>

                                    @if ($deliverable->purpose || $deliverable->audience || $deliverable->desired_action)
                                        <div class="grid gap-4 sm:grid-cols-3">
                                            <div>
                                                <h4 class="text-default-400 mb-1 text-xs uppercase">Purpose</h4>
                                                <p class="text-sm">{{ $deliverable->purpose ?: "Not provided" }}</p>
                                            </div>
                                            <div>
                                                <h4 class="text-default-400 mb-1 text-xs uppercase">Audience</h4>
                                                <p class="text-sm" data-detail-audience>{{ $deliverable->audience ?: "Not provided" }}</p>
                                            </div>
                                            <div>
                                                <h4 class="text-default-400 mb-1 text-xs uppercase">Desired action</h4>
                                                <p class="text-sm" data-detail-action>{{ $deliverable->desired_action ? \App\Support\RichText::plainText($deliverable->desired_action) : "Not provided" }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div data-task-form-container>
                                        <div class="mb-3 flex items-center justify-between">
                                            <h4 class="font-semibold">Tasks</h4>
                                            <div class="flex items-center gap-3">
                                                @if ($detailTasks->isNotEmpty())
                                                    <span class="text-default-400 text-xs" data-overview-task-count>{{ $detailTasks->count() }} total</span>
                                                @else
                                                    <span class="text-default-400 text-xs" data-overview-task-count>0 total</span>
                                                @endif
                                                @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                                    <button class="bg-primary inline-flex size-8 items-center justify-center rounded-full text-white hover:bg-primary-hover" data-task-form-toggle type="button" aria-label="Add task">
                                                        <i class="iconify tabler--plus text-lg"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="space-y-2" data-overview-task-list>
                                            @forelse ($detailTasks as $task)
                                                <button class="border-default-200 hover:border-primary/40 hover:bg-primary/5 flex w-full items-start justify-between gap-3 rounded-xl border p-3 text-start transition" data-task-trigger="{{ $task->id }}" type="button">
                                                    <div class="min-w-0">
                                                        <p class="truncate font-medium">{{ $task->title }}</p>
                                                        <p class="text-default-400 mt-1 text-xs">
                                                            {{ $task->assigneeProfile?->display_name ?: "Unassigned" }}
                                                            @if ($task->due_date) · due {{ $task->due_date->format("M j") }} @endif
                                                        </p>
                                                    </div>
                                                    <span class="flex items-center gap-2">
                                                        <span class="badge {{ $task->status->badgeClasses() }} shrink-0">{{ $task->status->value }}</span>
                                                        <i class="iconify tabler--chevron-right text-default-400"></i>
                                                    </span>
                                                </button>
                                            @empty
                                                <div class="border-default-200 rounded-xl border border-dashed py-8 text-center" data-overview-task-empty>
                                                    <i class="iconify tabler--list-check text-default-300 mb-2 size-8"></i>
                                                    <p class="text-default-400 text-sm">No tasks have been added.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                        @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                            <div class="border-default-200 mt-4 rounded-2xl border p-4">
                                                <div class="hidden" data-task-form-panel>
                                                    <div class="mb-4 flex items-center justify-between gap-3">
                                                        <div>
                                                            <h4 class="font-semibold">Add task</h4>
                                                            <p class="text-default-400 mt-1 text-sm">Create a new task without leaving the board.</p>
                                                        </div>
                                                        <button class="btn btn-sm bg-light text-default-700" data-task-form-cancel type="button">Cancel</button>
                                                    </div>
                                                    <form action="{{ route('tasks.store', [$project, $deliverable]) }}" class="space-y-4" data-task-create-form data-task-target="overview" method="POST">
                                                        @csrf
                                                        <div data-task-form-errors></div>
                                                        <input name="task_type" type="hidden" value="work" />
                                                        <input name="status" type="hidden" value="Not Started" />
                                                        <div>
                                                            <label class="form-label">Task title</label>
                                                            <input class="form-input" name="title" required />
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-textarea" name="description" rows="3"></textarea>
                                                        </div>
                                                        <div class="grid gap-4 sm:grid-cols-2">
                                                            <div>
                                                                <label class="form-label">Assignee</label>
                                                                <select class="form-select" name="assigned_to_profile_id">
                                                                    <option value="">Unassigned</option>
                                                                    @foreach ($teamProfiles as $profile)
                                                                        <option value="{{ $profile->id }}">{{ $profile->display_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Priority</label>
                                                                <select class="form-select" name="priority">
                                                                    @foreach (['Normal', 'High', 'Urgent'] as $priority)
                                                                        <option value="{{ $priority }}">{{ $priority }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="grid gap-4 sm:grid-cols-2">
                                                            <div>
                                                                <label class="form-label">Due date</label>
                                                                <input class="form-input" name="due_date" type="date" />
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Time budget (minutes)</label>
                                                                <input class="form-input" min="1" name="time_budget_minutes" type="number" />
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button class="btn bg-primary text-white hover:bg-primary-hover" data-save-task type="submit">
                                                                <i class="iconify tabler--plus me-1"></i>Add task
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if ($currentProfile->hasPermission("projects.manage"))
                                    <div class="hidden space-y-5" data-workspace-panel="edit">
                                        <form
                                            action="{{ route("deliverables.update", [$project, $deliverable]) }}"
                                            class="space-y-5"
                                            data-deliverable-edit-form
                                            id="board-deliverable-edit-{{ $deliverable->id }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method("PATCH")
                                            <div data-form-errors></div>
                                            <div>
                                                <label class="form-label">Title</label>
                                                <input class="form-input" name="title" required value="{{ $deliverable->title }}" />
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Type</label>
                                                    <select class="form-select" name="deliverable_type_id">
                                                        <option value="">— Select type —</option>
                                                        @foreach ($deliverableTypes as $type)
                                                            <option value="{{ $type->id }}" @selected($deliverable->deliverable_type_id === $type->id)>{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="form-label">Owner</label>
                                                    <select class="form-select" name="owner_profile_id">
                                                        <option value="">— Unassigned —</option>
                                                        @foreach ($teamProfiles as $profile)
                                                            <option value="{{ $profile->id }}" @selected($deliverable->owner_profile_id === $profile->id)>{{ $profile->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Due date</label>
                                                    <input class="form-input" name="due_date" type="date" value="{{ $deliverable->due_date?->format("Y-m-d") }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label">Publish date</label>
                                                    <input class="form-input" name="publish_date" type="date" value="{{ $deliverable->publish_date?->format("Y-m-d") }}" />
                                                </div>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Audience</label>
                                                    <input class="form-input" name="audience" value="{{ $deliverable->audience }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label">Desired action</label>
                                                    <input class="form-input" name="desired_action" value="{{ $deliverable->desired_action ? \App\Support\RichText::plainText($deliverable->desired_action) : "" }}" />
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label">Attention state</label>
                                                <select class="form-select" name="attention_state">
                                                    @foreach (["On Track", "Needs Attention", "At Risk", "On Hold"] as $attentionState)
                                                        <option value="{{ $attentionState }}" @selected($deliverable->attention_state === $attentionState)>{{ $attentionState }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>

                                        @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                            <div class="border-default-200 rounded-2xl border p-4" data-task-form-container>
                                                <div class="mb-3 flex items-center justify-between gap-3">
                                                    <div>
                                                        <h4 class="font-semibold">Tasks</h4>
                                                        <p class="text-default-400 mt-1 text-sm">Add a task without leaving the board.</p>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <span class="text-default-400 text-xs" data-edit-task-count>{{ $detailTasks->count() }} total</span>
                                                        <button class="bg-primary inline-flex size-8 items-center justify-center rounded-full text-white hover:bg-primary-hover" data-task-form-toggle type="button" aria-label="Add task">
                                                            <i class="iconify tabler--plus text-lg"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="space-y-2 mb-4" data-edit-task-list>
                                                    @forelse ($detailTasks as $task)
                                                        <div class="border-default-200 flex items-start justify-between gap-3 rounded-xl border p-3">
                                                            <div class="min-w-0">
                                                                <p class="truncate font-medium">{{ $task->title }}</p>
                                                                <p class="text-default-400 mt-1 text-xs">
                                                                    {{ $task->assigneeProfile?->display_name ?: "Unassigned" }}
                                                                    @if ($task->due_date) · due {{ $task->due_date->format("M j") }} @endif
                                                                    @if ($task->time_budget_minutes) · {{ $task->formattedTimeBudget() }} @endif
                                                                </p>
                                                            </div>
                                                            <span class="badge {{ $task->status->badgeClasses() }} shrink-0">{{ $task->status->value }}</span>
                                                        </div>
                                                    @empty
                                                        <div class="border-default-200 rounded-xl border border-dashed py-8 text-center" data-edit-task-empty>
                                                            <i class="iconify tabler--list-check text-default-300 mb-2 size-8"></i>
                                                            <p class="text-default-400 text-sm">No tasks have been added.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                                <div class="mt-4 hidden" data-task-form-panel>
                                                    <div class="mb-4 flex items-center justify-between gap-3">
                                                        <div>
                                                            <h4 class="font-semibold">Add task</h4>
                                                            <p class="text-default-400 mt-1 text-sm">Create a new task without leaving the board.</p>
                                                        </div>
                                                        <button class="btn btn-sm bg-light text-default-700" data-task-form-cancel type="button">Cancel</button>
                                                    </div>
                                                    <form action="{{ route('tasks.store', [$project, $deliverable]) }}" class="space-y-4" data-task-create-form data-task-target="edit" method="POST">
                                                        @csrf
                                                        <div data-task-form-errors></div>
                                                        <input name="task_type" type="hidden" value="work" />
                                                        <input name="status" type="hidden" value="Not Started" />
                                                        <div>
                                                            <label class="form-label">Task title</label>
                                                            <input class="form-input" name="title" required />
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-textarea" name="description" rows="3"></textarea>
                                                        </div>
                                                        <div class="grid gap-4 sm:grid-cols-2">
                                                            <div>
                                                                <label class="form-label">Assignee</label>
                                                                <select class="form-select" name="assigned_to_profile_id">
                                                                    <option value="">Unassigned</option>
                                                                    @foreach ($teamProfiles as $profile)
                                                                        <option value="{{ $profile->id }}">{{ $profile->display_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Priority</label>
                                                                <select class="form-select" name="priority">
                                                                    @foreach (['Normal', 'High', 'Urgent'] as $priority)
                                                                        <option value="{{ $priority }}">{{ $priority }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="grid gap-4 sm:grid-cols-2">
                                                            <div>
                                                                <label class="form-label">Due date</label>
                                                                <input class="form-input" name="due_date" type="date" />
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Time budget (minutes)</label>
                                                                <input class="form-input" min="1" name="time_budget_minutes" type="number" />
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button class="btn bg-primary text-white hover:bg-primary-hover" data-save-task type="submit">
                                                                <i class="iconify tabler--plus me-1"></i>Add task
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex flex-wrap items-center justify-between gap-3">
                                            <button class="btn bg-primary text-white hover:bg-primary-hover" data-save-deliverable form="board-deliverable-edit-{{ $deliverable->id }}" type="submit">
                                                <i class="iconify tabler--device-floppy me-1"></i>Save changes
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                @if ($canManage)
                                    <div class="hidden space-y-6" data-workspace-panel="advanced">
                                        <form
                                            action="{{ route("deliverables.update", [$project, $deliverable]) }}"
                                            class="space-y-5"
                                            data-deliverable-edit-form
                                            data-save-panel="advanced"
                                            method="POST"
                                        >
                                            @csrf
                                            @method("PATCH")
                                            <div data-form-errors></div>
                                            <div>
                                                <label class="form-label">Title</label>
                                                <input class="form-input" name="title" required value="{{ $deliverable->title }}" />
                                            </div>
                                            <div>
                                                <label class="form-label">Type</label>
                                                <select class="form-select" name="deliverable_type_id">
                                                    <option value="">— Select type —</option>
                                                    @foreach ($deliverableTypes as $type)
                                                        <option value="{{ $type->id }}" @selected($deliverable->deliverable_type_id === $type->id)>{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Description / Brief</label>
                                                <textarea class="form-textarea" name="description" rows="4">{{ $deliverable->description ? \App\Support\RichText::plainText($deliverable->description) : "" }}</textarea>
                                            </div>
                                            <div>
                                                <label class="form-label">Purpose</label>
                                                <textarea class="form-textarea" name="purpose" rows="3">{{ $deliverable->purpose ? \App\Support\RichText::plainText($deliverable->purpose) : "" }}</textarea>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Audience</label>
                                                    <input class="form-input" name="audience" value="{{ $deliverable->audience }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label">Desired action</label>
                                                    <input class="form-input" name="desired_action" value="{{ $deliverable->desired_action ? \App\Support\RichText::plainText($deliverable->desired_action) : "" }}" />
                                                </div>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Owner</label>
                                                    <select class="form-select" name="owner_profile_id">
                                                        <option value="">— Unassigned —</option>
                                                        @foreach ($teamProfiles as $profile)
                                                            <option value="{{ $profile->id }}" @selected($deliverable->owner_profile_id === $profile->id)>{{ $profile->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="form-label">Internal reviewer</label>
                                                    <select class="form-select" name="internal_reviewer_profile_id">
                                                        <option value="">— None —</option>
                                                        @foreach ($teamProfiles as $profile)
                                                            <option value="{{ $profile->id }}" @selected($deliverable->internal_reviewer_profile_id === $profile->id)>{{ $profile->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Stakeholder reviewer</label>
                                                    <select class="form-select" name="stakeholder_reviewer_profile_id">
                                                        <option value="">— None —</option>
                                                        @foreach ($teamProfiles as $profile)
                                                            <option value="{{ $profile->id }}" @selected($deliverable->stakeholder_reviewer_profile_id === $profile->id)>{{ $profile->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="form-label">Attention state</label>
                                                    <select class="form-select" name="attention_state">
                                                        @foreach (["On Track", "Needs Attention", "At Risk", "On Hold"] as $attentionState)
                                                            <option value="{{ $attentionState }}" @selected($deliverable->attention_state === $attentionState)>{{ $attentionState }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid gap-5 sm:grid-cols-2">
                                                <div>
                                                    <label class="form-label">Due date</label>
                                                    <input class="form-input" name="due_date" type="date" value="{{ $deliverable->due_date?->format("Y-m-d") }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label">Publish date</label>
                                                    <input class="form-input" name="publish_date" type="date" value="{{ $deliverable->publish_date?->format("Y-m-d") }}" />
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                                <button class="btn bg-primary text-white hover:bg-primary-hover" data-save-deliverable type="submit">
                                                    <i class="iconify tabler--device-floppy me-1"></i>Save advanced changes
                                                </button>
                                            </div>
                                        </form>

                                        <div data-task-form-container>
                                            <div class="mb-3 flex items-center justify-between">
                                                <h4 class="font-semibold">Task list</h4>
                                                <div class="flex items-center gap-3">
                                                    <span class="text-default-400 text-xs" data-advanced-task-count>{{ $detailTasks->count() }} total</span>
                                                    @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                                        <button class="bg-primary inline-flex size-8 items-center justify-center rounded-full text-white hover:bg-primary-hover" data-task-form-toggle type="button" aria-label="Add task">
                                                            <i class="iconify tabler--plus text-lg"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

                                            @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                                <div class="border-default-200 mb-4 hidden rounded-2xl border p-4" data-task-form-panel>
                                                    <div class="mb-4 flex items-center justify-between gap-3">
                                                        <div>
                                                            <h4 class="font-semibold">Add task</h4>
                                                            <p class="text-default-400 mt-1 text-sm">Create a new task without leaving the board.</p>
                                                        </div>
                                                        <button class="btn btn-sm bg-light text-default-700" data-task-form-cancel type="button">Cancel</button>
                                                    </div>
                                                    <form action="{{ route('tasks.store', [$project, $deliverable]) }}" class="space-y-4" data-task-create-form method="POST">
                                                    @csrf
                                                    <div data-task-form-errors></div>
                                                    <input name="task_type" type="hidden" value="work" />
                                                    <input name="status" type="hidden" value="Not Started" />
                                                    <div>
                                                        <label class="form-label">Task title</label>
                                                        <input class="form-input" name="title" required />
                                                    </div>
                                                    <div>
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-textarea" name="description" rows="3"></textarea>
                                                    </div>
                                                    <div class="grid gap-4 sm:grid-cols-2">
                                                        <div>
                                                            <label class="form-label">Assignee</label>
                                                            <select class="form-select" name="assigned_to_profile_id">
                                                                <option value="">Unassigned</option>
                                                                @foreach ($teamProfiles as $profile)
                                                                    <option value="{{ $profile->id }}">{{ $profile->display_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Priority</label>
                                                            <select class="form-select" name="priority">
                                                                @foreach (['Normal', 'High', 'Urgent'] as $priority)
                                                                    <option value="{{ $priority }}">{{ $priority }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="grid gap-4 sm:grid-cols-2">
                                                        <div>
                                                            <label class="form-label">Due date</label>
                                                            <input class="form-input" name="due_date" type="date" />
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Time budget (minutes)</label>
                                                            <input class="form-input" min="1" name="time_budget_minutes" type="number" />
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button class="btn bg-primary text-white hover:bg-primary-hover" data-save-task type="submit">
                                                            <i class="iconify tabler--plus me-1"></i>Add task
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            @endif

                                            <div class="space-y-2" data-advanced-task-list>
                                                @forelse ($detailTasks as $task)
                                                    <div class="border-default-200 flex items-start justify-between gap-3 rounded-xl border p-3">
                                                        <div class="min-w-0">
                                                            <p class="truncate font-medium">{{ $task->title }}</p>
                                                            <p class="text-default-400 mt-1 text-xs">
                                                                {{ $task->assigneeProfile?->display_name ?: "Unassigned" }}
                                                                @if ($task->due_date) · due {{ $task->due_date->format("M j") }} @endif
                                                                @if ($task->time_budget_minutes) · {{ $task->formattedTimeBudget() }} @endif
                                                            </p>
                                                        </div>
                                                        <span class="badge {{ $task->status->badgeClasses() }} shrink-0">{{ $task->status->value }}</span>
                                                    </div>
                                                @empty
                                                    <div class="border-default-200 rounded-xl border border-dashed py-8 text-center" data-advanced-task-empty>
                                                        <i class="iconify tabler--list-check text-default-300 mb-2 size-8"></i>
                                                        <p class="text-default-400 text-sm">No tasks have been added.</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </template>

                        @foreach ($detailTasks as $task)
                            <template id="board-task-detail-{{ $task->id }}">
                                <div data-task-workspace>
                                    <button class="text-primary mb-5 inline-flex items-center gap-1 text-sm font-semibold hover:underline" data-task-back type="button">
                                        <i class="iconify tabler--arrow-left"></i>Back to {{ $deliverable->title }}
                                    </button>
                                    <div class="mb-5">
                                        <div class="mb-3 flex flex-wrap gap-2">
                                            <span class="badge {{ $task->status->badgeClasses() }}">{{ $task->status->value }}</span>
                                            <span class="badge bg-light text-default-600">{{ $task->priority ?: "Normal" }} priority</span>
                                            <span class="badge {{ $task->taskType()->badgeClasses() }}">{{ $task->taskType()->label() }}</span>
                                        </div>
                                        <h3 class="text-xl font-semibold">{{ $task->title }}</h3>
                                    </div>
                                    <dl class="mb-6 grid grid-cols-2 gap-4 text-sm sm:grid-cols-3">
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Assignee</dt>
                                            <dd class="mt-1 font-medium">{{ $task->assigneeProfile?->display_name ?: "Unassigned" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Due</dt>
                                            <dd class="mt-1 font-medium">{{ $task->due_date?->format("M j, Y") ?: "Not set" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400 text-xs uppercase">Time budget</dt>
                                            <dd class="mt-1 font-medium">{{ $task->formattedTimeBudget() }}</dd>
                                        </div>
                                    </dl>
                                    <div>
                                        <h4 class="mb-2 font-semibold">Task brief</h4>
                                        @if ($task->description)
                                            <x-rich-text :value="$task->description" />
                                        @else
                                            <p class="text-default-400 text-sm">No task description has been added.</p>
                                        @endif
                                    </div>
                                    <div class="mt-6">
                                        <h4 class="mb-2 font-semibold">Files & links</h4>
                                        <div class="space-y-2">
                                            @forelse ($task->links as $link)
                                                <a class="border-default-200 hover:border-primary/40 hover:bg-primary/5 flex items-center justify-between gap-3 rounded-xl border p-3 transition" href="{{ $link->url }}" rel="noopener noreferrer" target="_blank">
                                                    <span class="min-w-0 truncate text-sm font-medium text-primary">
                                                        <i class="iconify tabler--file-link me-1"></i>{{ $link->displayLabel() }}
                                                    </span>
                                                    <i class="iconify tabler--external-link text-default-400 shrink-0"></i>
                                                </a>
                                            @empty
                                                <p class="text-default-400 text-sm">No files or links attached.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    @if ($task->status === \App\Enums\TaskStatus::Blocked)
                                        <div class="bg-danger/10 text-danger mt-5 rounded-xl p-4">
                                            <p class="font-semibold"><i class="iconify tabler--alert-triangle me-1"></i>{{ $task->blocker_type }}</p>
                                            <p class="mt-1 text-sm">{{ $task->blocker_reason }}</p>
                                        </div>
                                    @endif
                                </div>
                            </template>
                        @endforeach
                    @endforeach

                    <dialog
                        class="m-auto max-h-[calc(100vh-2rem)] w-[calc(100%-2rem)] max-w-3xl overflow-hidden rounded-3xl border-0 bg-card p-0 text-default-700 shadow-2xl"
                        id="board-deliverable-dialog"
                        aria-labelledby="board-deliverable-dialog-title"
                    >
                        <div class="flex max-h-[calc(100vh-2rem)] flex-col">
                            <div class="border-default-200 flex items-center justify-between border-b px-5 py-4 sm:px-7">
                                <div>
                                    <p class="text-default-400 text-xs font-semibold uppercase">Deliverable details</p>
                                    <h2 class="sr-only" id="board-deliverable-dialog-title">Deliverable details</h2>
                                </div>
                                <button class="btn btn-icon size-9 rounded-full bg-light text-default-500 hover:text-primary" data-dialog-close type="button" aria-label="Close details">
                                    <i class="iconify tabler--x text-xl"></i>
                                </button>
                            </div>
                            <div class="overflow-y-auto px-5 py-6 sm:px-7" data-dialog-content></div>
                        </div>
                    </dialog>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
    @vite(["resources/js/pages/board.js", "resources/js/pages/project-view-switcher.js"])
@endsection
