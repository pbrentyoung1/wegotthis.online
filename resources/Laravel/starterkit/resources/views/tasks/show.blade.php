@extends("shared.base", ["title" => $task->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $deliverable->title, "title" => $task->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $deliverable->title, "subtitleUrl" => route("deliverables.show", [$project, $deliverable]), "title" => $task->title])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <nav aria-label="breadcrumb" class="flex items-center gap-1 text-sm">
                            <a class="text-primary hover:underline" href="{{ route("projects.show", $project) }}">{{ $project->title }}</a>
                            <span class="text-default-400">/</span>
                            @if ($canViewDeliverable)
                                <a class="text-primary hover:underline" href="{{ route("deliverables.show", [$project, $deliverable]) }}">{{ $deliverable->title }}</a>
                                <span class="text-default-400">/</span>
                            @else
                                <span class="text-default-500">{{ $deliverable->title }}</span>
                                <span class="text-default-400">/</span>
                            @endif
                            <span class="text-default-500">{{ $task->title }}</span>
                        </nav>
                        <div class="flex gap-2">
                            <a class="btn btn-sm bg-light text-default-600 hover:text-primary" href="{{ route("projects.show", $project) }}">
                                <i class="iconify tabler--briefcase me-1"></i>View project
                            </a>
                            @if ($canViewDeliverable)
                                <a class="btn btn-sm bg-light text-default-600 hover:text-primary" href="{{ route("deliverables.show", [$project, $deliverable]) }}">
                                    <i class="iconify tabler--package me-1"></i>View deliverable
                                </a>
                            @endif
                            @if ($canUpdate)
                                <a class="btn btn-sm bg-primary text-white hover:bg-primary-hover" href="{{ route("tasks.edit", [$project, $deliverable, $task]) }}">
                                    <i class="iconify tabler--pencil me-1"></i>Edit task
                                </a>
                            @endif
                        </div>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-3">
                        {{-- Main content --}}
                        <div class="lg:col-span-2 space-y-base">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h3 class="font-semibold">{{ $task->title }}</h3>
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            <span class="badge {{ $task->taskType()->badgeClasses() }}">
                                                <i class="iconify {{ $task->taskType()->icon() }} me-1"></i>{{ $task->taskType()->label() }}
                                            </span>
                                            <span class="badge {{ $task->status->badgeClasses() }}">{{ $task->status->value }}</span>
                                            <span class="badge bg-light text-default-600">{{ $task->priority ?: "Normal" }} priority</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ($task->description)
                                        <x-rich-text :value="$task->description" />
                                    @else
                                        <p class="text-default-400">No description provided.</p>
                                    @endif

                                    @if ($task->status === \App\Enums\TaskStatus::Blocked)
                                        <div class="bg-danger/10 text-danger mt-5 rounded-lg p-4">
                                            <p class="font-semibold"><i class="iconify tabler--alert-triangle me-1"></i>{{ $task->blocker_type }}</p>
                                            <p class="mt-1 text-sm">{{ $task->blocker_reason }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Sidebar --}}
                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Task details</h4>
                                </div>
                                <div class="card-body">
                                    <dl class="space-y-4 text-sm">
                                        <div>
                                            <dt class="text-default-400">Assignee</dt>
                                            <dd class="mt-1 font-medium">
                                                @if ($task->assigneeProfile)
                                                    <a class="hover:text-primary" href="{{ route('people.show', $task->assigneeProfile) }}">{{ $task->assigneeProfile->display_name }}</a>
                                                @else
                                                    Unassigned
                                                @endif
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Due date</dt>
                                            <dd class="mt-1 font-medium">{{ $task->due_date?->format("M j, Y") ?: "Not set" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Time budget</dt>
                                            <dd class="mt-1 font-medium">{{ $task->formattedTimeBudget() }}</dd>
                                        </div>
                                        <div class="border-t border-default-200 pt-4">
                                            <dt class="text-default-400">Deliverable budget</dt>
                                            <dd class="mt-1 font-medium">{{ $deliverable->timeBudgetMinutes() }} min</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Project budget</dt>
                                            <dd class="mt-1 font-medium">{{ $project->timeBudgetMinutes() }} min</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Files & links</h4>
                                        <p class="text-default-400 mt-1 text-xs">Drive files, folders, working assets, and references.</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @forelse ($task->links as $link)
                                        <div class="mb-3 flex items-center justify-between gap-3">
                                            <a class="text-primary min-w-0 truncate text-sm hover:underline" href="{{ $link->url }}" rel="noopener noreferrer" target="_blank">
                                                <i class="iconify tabler--file-link me-1"></i>{{ $link->displayLabel() }}
                                            </a>
                                            @if ($canUpdate)
                                                <form action="{{ route("tasks.links.destroy", [$project, $deliverable, $task, $link]) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="text-default-400 hover:text-danger text-xs" type="submit">Remove</button>
                                                </form>
                                            @endif
                                        </div>
                                    @empty
                                        <p class="text-default-400 text-sm">No files or links attached.</p>
                                    @endforelse

                                    @if ($canUpdate)
                                        <form class="mt-4 space-y-2 border-t border-default-200 pt-4" action="{{ route("tasks.links.store", [$project, $deliverable, $task]) }}" method="POST">
                                            @csrf
                                            <input class="form-input text-sm" name="url" placeholder="Paste a URL" required type="url" />
                                            <input class="form-input text-sm" name="label" placeholder="Label (optional)" />
                                            <button class="btn btn-sm bg-light text-default-600 w-full" type="submit">
                                                <i class="iconify tabler--plus me-1"></i>Add file or link
                                            </button>
                                        </form>
                                    @endif
                                </div>
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
