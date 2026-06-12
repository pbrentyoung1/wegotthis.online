@extends("shared.base", ["title" => $project->title . " Schedule"])

@section("content")
<div class="wrapper">
    @include("shared.partials.topbar", ["subtitle" => $project->title, "title" => "Project Schedule"])
    @include("shared.partials.sidenav")
    <div class="page-content"><main>
        @include("shared.partials.page-title", ["subtitle" => $project->title, "title" => "Project Schedule"])
        <div class="container-fluid">
            <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                <a class="text-primary text-sm hover:underline" href="{{ route("projects.show", $project) }}"><i class="iconify tabler--arrow-left me-1"></i>Back to project</a>
                @if ($canReorder)<button class="btn bg-primary text-white" data-save-schedule type="button">Save order</button>@endif
            </div>
            @include("auth.partials.messages")
            <div class="card mb-base">
                <div class="card-header"><h4 class="card-title">Project window</h4></div>
                <div class="card-body">
                    <form action="{{ route("projects.schedule.dates", $project) }}" class="grid grid-cols-1 items-end gap-4 md:grid-cols-[1fr_1fr_auto]" method="POST">
                        @csrf @method("PATCH") <input name="source_type" type="hidden" value="project" />
                        <div><label class="form-label">Start date</label><input class="form-input" data-provider="flatpickr" name="start_date" value="{{ $project->start_date?->format("Y-m-d") }}" /></div>
                        <div><label class="form-label">Stop date</label><input class="form-input" data-provider="flatpickr" name="stop_date" value="{{ $project->stop_date?->format("Y-m-d") }}" /></div>
                        @if($canReorder)<button class="btn bg-light text-default-700" type="submit">Update dates</button>@endif
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><div><h4 class="card-title">Production sequence</h4><p class="text-default-400 mt-1 text-sm">Drag deliverables and their tasks into the order the team should work them.</p></div></div>
                <div class="card-body">
                    <div class="space-y-4" data-project-schedule data-reorder-url="{{ route("projects.schedule.reorder", $project) }}" data-sort-list="deliverable">
                        @forelse ($project->deliverables as $deliverable)
                            <section class="rounded border border-default-300 bg-light/40 p-4" data-deliverable-id="{{ $deliverable->id }}" data-sort-type="deliverable" @if($canReorder) draggable="true" @endif>
                                <div class="mb-3 flex flex-wrap items-center justify-between gap-3">
                                    <div class="flex items-center gap-3">@if($canReorder)<i class="iconify tabler--grip-vertical cursor-grab text-default-400"></i>@endif<div><a class="font-semibold hover:text-primary" href="{{ route("deliverables.show", [$project, $deliverable]) }}">{{ $deliverable->title }}</a><p class="text-default-400 text-xs">{{ $deliverable->deliverableType?->name ?: "Other" }}</p></div></div>
                                    <div class="flex flex-wrap items-end gap-2"><span class="badge {{ $deliverable->lifecycle_status->badgeClasses() }}">{{ $deliverable->lifecycle_status->value }}</span>
                                        <form action="{{ route("projects.schedule.dates", $project) }}" class="flex items-end gap-2" method="POST">@csrf @method("PATCH")<input name="source_type" type="hidden" value="deliverable" /><input name="source_id" type="hidden" value="{{ $deliverable->id }}" /><div><label class="text-default-400 block text-[10px] uppercase">Due</label><input class="form-input py-1 text-xs" data-provider="flatpickr" name="due_date" placeholder="Due date" value="{{ $deliverable->due_date?->format("Y-m-d") }}" /></div><div><label class="text-default-400 block text-[10px] uppercase">Publish</label><input class="form-input py-1 text-xs" data-provider="flatpickr" name="publish_date" placeholder="Publish date" value="{{ $deliverable->publish_date?->format("Y-m-d") }}" /></div>@if($canReorder)<button aria-label="Save deliverable dates" class="btn btn-sm bg-white text-primary" type="submit"><i class="iconify tabler--check"></i></button>@endif</form>
                                    </div>
                                </div>
                                <div class="space-y-2 ps-6" data-deliverable-id="{{ $deliverable->id }}" data-sort-list="task">
                                    @forelse ($deliverable->tasks as $task)
                                        <div class="flex flex-wrap items-center justify-between gap-3 rounded border border-default-200 bg-white p-3" data-deliverable-id="{{ $deliverable->id }}" data-sort-type="task" data-task-id="{{ $task->id }}" @if($canReorder) draggable="true" @endif>
                                            <div class="flex items-center gap-2">@if($canReorder)<i class="iconify tabler--grip-vertical cursor-grab text-default-300"></i>@endif<a class="font-medium hover:text-primary" href="{{ route("tasks.show", [$project, $deliverable, $task]) }}">{{ $task->title }}</a></div>
                                            <div class="flex items-end gap-2 text-xs"><span>{{ $task->assigneeProfile?->display_name ?: "Unassigned" }}</span><span class="badge {{ $task->status->badgeClasses() }}">{{ $task->status->value }}</span><form action="{{ route("projects.schedule.dates", $project) }}" class="flex items-end gap-1" method="POST">@csrf @method("PATCH")<input name="source_type" type="hidden" value="task" /><input name="source_id" type="hidden" value="{{ $task->id }}" /><input class="form-input py-1 text-xs" data-provider="flatpickr" name="due_date" placeholder="Due date" value="{{ $task->due_date?->format("Y-m-d") }}" />@if($canReorder)<button aria-label="Save task date" class="btn btn-sm bg-light text-primary" type="submit"><i class="iconify tabler--check"></i></button>@endif</form></div>
                                        </div>
                                    @empty
                                        <p class="text-default-400 py-3 text-sm">No tasks yet.</p>
                                    @endforelse
                                </div>
                            </section>
                        @empty
                            <p class="text-default-400 py-10 text-center">No deliverables yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>@include("shared.partials.footer")</div>
</div>
@include("shared.partials.customizer")
@endsection

@section("scripts")
    @vite(["resources/js/pages/project-schedule.js"])
@endsection
