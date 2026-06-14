@extends("shared.base", ["title" => "My Profile"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Profile", "title" => "My Profile"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Profile", "title" => "My Profile"])

                <div class="container-fluid">

                    {{-- Hero card --}}
                    <div class="card mb-base overflow-hidden">

                        {{-- Banner --}}
                        <div class="h-44 overflow-hidden">
                            @if ($profile?->banner_url)
                                <img src="{{ $profile->banner_url }}" class="h-full w-full object-cover" />
                            @else
                                <div class="h-full w-full bg-gradient-to-r from-primary/80 to-primary/40"></div>
                            @endif
                        </div>

                        {{-- Avatar + name row --}}
                        <div class="card-body">
                            <div class="-mt-16 flex flex-wrap items-end justify-between gap-4">
                                <div class="flex items-end gap-4">
                                    <div class="shrink-0">
                                        <img alt="{{ $profile?->display_name ?? auth()->user()->name }}"
                                            class="size-24 rounded-full border-4 border-white object-cover shadow dark:border-default-700"
                                            src="{{ $profile?->avatar_url ?: '/images/users/user-1.jpg' }}" />
                                    </div>
                                    <div class="mb-1">
                                        <h4 class="text-lg font-bold">{{ $profile?->display_name ?? auth()->user()->name }}</h4>
                                        @if ($profile?->title)
                                            <p class="text-default-400 text-sm">{{ $profile->title }}</p>
                                        @endif
                                        <div class="mt-2 flex flex-wrap gap-1.5">
                                            @if ($profile)
                                                <span class="badge bg-light text-default-600">{{ $profile->person_type }}</span>
                                                @foreach ($profile->roleAssignments->whereNull("ended_at") as $assignment)
                                                    <span class="badge bg-primary/10 text-primary">{{ $assignment->role->name }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-sm bg-light text-default-700 mb-1" href="{{ route('profile.edit') }}">
                                    <i class="iconify tabler--settings-2 me-1.5 size-4"></i>Account settings
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($profile)
                        {{-- Sidebar + content --}}
                        <div class="grid grid-cols-1 gap-base lg:grid-cols-3">

                            {{-- Left sidebar: personal details --}}
                            <div class="space-y-base">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Personal details</h4>
                                    </div>
                                    <div class="card-body space-y-3">
                                        @if ($profile->title)
                                            <div class="flex items-center gap-3">
                                                <div class="btn btn-icon size-8 bg-light shrink-0">
                                                    <i class="iconify tabler--briefcase text-secondary size-4"></i>
                                                </div>
                                                <p class="text-sm">{{ $profile->title }}</p>
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-3">
                                            <div class="btn btn-icon size-8 bg-light shrink-0">
                                                <i class="iconify tabler--building text-secondary size-4"></i>
                                            </div>
                                            <p class="text-sm">
                                                {{ $profile->organization->name }}
                                                @if ($profile->department)
                                                    <span class="text-default-400">· {{ $profile->department->name }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="btn btn-icon size-8 bg-light shrink-0">
                                                <i class="iconify tabler--mail text-secondary size-4"></i>
                                            </div>
                                            <a class="truncate text-sm text-primary hover:underline" href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                                        </div>
                                        @if ($profile->phone)
                                            <div class="flex items-center gap-3">
                                                <div class="btn btn-icon size-8 bg-light shrink-0">
                                                    <i class="iconify tabler--phone text-secondary size-4"></i>
                                                </div>
                                                <a class="text-sm hover:text-primary" href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                                            </div>
                                        @endif
                                        @if ($profile->bio)
                                            <div class="border-t border-default-200 pt-3">
                                                <p class="text-default-500 text-sm">{{ $profile->bio }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Skills placeholder --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            <i class="iconify tabler--sparkles text-primary me-1.5"></i>Skills
                                        </h4>
                                    </div>
                                    <div class="card-body py-8 text-center">
                                        <p class="text-default-400 text-sm">Skills coming soon.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Right: tasks + messages (2 of 3 cols) --}}
                            <div class="lg:col-span-2 space-y-base">

                                {{-- My Tasks --}}
                                <div class="card">
                                    <div class="card-header flex items-center justify-between">
                                        <h4 class="card-title">
                                            <i class="iconify tabler--list-check text-primary me-1.5"></i>My tasks
                                        </h4>
                                        <a class="text-primary text-xs hover:underline" href="{{ route('tasks.index') }}">View all</a>
                                    </div>
                                    <div class="card-body">
                                        @if ($myTasks->isEmpty())
                                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                                <i class="iconify tabler--circle-check text-default-300 mb-2 size-8"></i>
                                                <p class="text-default-400 text-sm">No open tasks assigned to you.</p>
                                            </div>
                                        @else
                                            <ul class="divide-y divide-default-100">
                                                @foreach ($myTasks as $task)
                                                    <li class="py-3 first:pt-0 last:pb-0">
                                                        <a class="group flex items-start gap-3" href="{{ route('tasks.show', [$task->deliverable->project, $task->deliverable, $task]) }}">
                                                            <span class="badge {{ $task->status->badgeClasses() }} mt-0.5 shrink-0 text-[11px]">{{ $task->status->value }}</span>
                                                            <div class="min-w-0">
                                                                <p class="truncate text-sm font-medium group-hover:text-primary">{{ $task->title }}</p>
                                                                <p class="text-default-400 mt-0.5 truncate text-xs">{{ $task->deliverable->project->title }} · {{ $task->deliverable->title }}</p>
                                                            </div>
                                                            @if ($task->due_date)
                                                                <span class="text-default-400 ms-auto shrink-0 text-xs">{{ $task->due_date->format('M j') }}</span>
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>

                                {{-- Messages --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            <i class="iconify tabler--message-circle text-primary me-1.5"></i>Messages
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($myConversations->isEmpty())
                                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                                <i class="iconify tabler--message-off text-default-300 mb-2 size-8"></i>
                                                <p class="text-default-400 text-sm">No conversations yet.</p>
                                            </div>
                                        @else
                                            <ul class="divide-y divide-default-100">
                                                @foreach ($myConversations as $convo)
                                                    <li class="py-3 first:pt-0 last:pb-0">
                                                        <a class="group flex items-start gap-3" href="{{ $convo['url'] }}">
                                                            <div class="mt-1 shrink-0">
                                                                @if ($convo['unread'])
                                                                    <span class="block size-2 rounded-full bg-primary"></span>
                                                                @else
                                                                    <span class="block size-2 rounded-full bg-default-200"></span>
                                                                @endif
                                                            </div>
                                                            <div class="min-w-0 grow">
                                                                <p class="truncate text-sm font-medium group-hover:text-primary @if(!$convo['unread']) text-default-600 @endif">{{ $convo['title'] }}</p>
                                                                @if ($convo['preview'])
                                                                    <p class="text-default-400 mt-0.5 truncate text-xs">{{ $convo['preview'] }}</p>
                                                                @endif
                                                            </div>
                                                            <span class="text-default-400 ms-auto shrink-0 text-xs">{{ $convo['updated_at']->diffForHumans(null, true, true) }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    @else
                        <div class="card">
                            <div class="card-body py-10 text-center">
                                <i class="iconify tabler--user-off text-default-300 mb-3 size-10"></i>
                                <p class="font-semibold">No workspace profile</p>
                                <p class="text-default-400 mt-1 text-sm">Your login isn't connected to an organization profile yet. An administrator can complete that setup.</p>
                            </div>
                        </div>
                    @endif

                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection
