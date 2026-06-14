@extends("shared.base", ["title" => "My Tasks"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Work", "title" => "My Tasks"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Work", "title" => "My Tasks"])
                <div class="container-fluid">
                    @include("auth.partials.messages")

                    {{-- Needs approval alerts --}}
                    @if ($approvalAlerts->isNotEmpty())
                        <div class="card border-secondary/30 bg-secondary/5 mb-base border">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="iconify tabler--clipboard-check text-secondary me-1"></i>Needs approval
                                </h4>
                            </div>
                            <div class="card-body space-y-3">
                                @foreach ($approvalAlerts as $alert)
                                    <a class="bg-white/70 hover:bg-secondary/10 flex items-start gap-3 rounded p-3" href="{{ $alert->action_url }}">
                                        <i class="iconify tabler--clipboard-check text-secondary mt-0.5 text-lg"></i>
                                        <div>
                                            <p class="font-semibold">{{ $alert->title }}</p>
                                            <p class="text-default-400 mt-0.5 text-sm">{{ $alert->body }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Active blocker alerts --}}
                    @if ($blockedAlerts->isNotEmpty())
                        <div class="card mb-base">
                            <div class="card-header">
                                <h4 class="card-title">Active blockers</h4>
                            </div>
                            <div class="card-body space-y-3">
                                @foreach ($blockedAlerts as $alert)
                                    <a class="bg-light hover:bg-primary/5 flex items-start gap-3 rounded p-3" href="{{ $alert->action_url }}">
                                        <i class="iconify tabler--alert-triangle text-danger mt-0.5 text-lg"></i>
                                        <div>
                                            <p class="font-semibold">{{ $alert->title }}</p>
                                            <p class="text-default-400 mt-0.5 text-sm">{{ $alert->body }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Empty state --}}
                    @if ($tasks->isEmpty())
                        <div class="card">
                            <div class="card-body py-14 text-center">
                                <i class="iconify tabler--list-check text-default-300 mb-3 size-10"></i>
                                <p class="font-semibold">No open tasks</p>
                                <p class="text-default-400 mt-1 text-sm">You're all caught up. Tasks assigned to you will appear here.</p>
                            </div>
                        </div>
                    @endif

                    {{-- Task sections --}}
                    @foreach ([
                        ['key' => 'clarification', 'title' => 'Needs clarification', 'description' => 'Questions and missing information that need a response.', 'classes' => 'border-info/40 bg-info/5', 'icon' => 'tabler--message-question text-info'],
                        ['key' => 'work', 'title' => 'Work tasks', 'description' => 'Production and coordination work assigned to you.', 'classes' => 'border-default-300', 'icon' => 'tabler--list-check text-primary'],
                    ] as $section)
                        @if ($taskGroups[$section['key']]->isNotEmpty())
                            <div class="card {{ $section['classes'] }} mb-base border">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">
                                            <i class="iconify {{ $section['icon'] }} me-1"></i>{{ $section['title'] }}
                                        </h4>
                                        <p class="text-default-400 mt-1 text-xs">{{ $section['description'] }}</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @include("tasks.partials.task-table", ["sectionTasks" => $taskGroups[$section['key']]])
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{ $tasks->links() }}
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection
