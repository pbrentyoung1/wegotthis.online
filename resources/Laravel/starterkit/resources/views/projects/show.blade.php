@extends("shared.base", ["title" => $project->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Projects", "title" => $project->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Projects", "title" => $project->title])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("projects.index") }}"><i class="iconify tabler--arrow-left me-1"></i>Back to projects</a>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-4 lg:gap-0">
                        <div class="lg:col-span-3">
                            <div class="card h-full">
                                <div class="card-header flex flex-wrap items-start gap-base p-7.5">
                                    <div class="bg-primary/10 text-primary me-3 flex size-16 items-center justify-center rounded">
                                        <i class="iconify tabler--briefcase text-3xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="mb-1 text-lg font-semibold">{{ $project->title }}</h3>
                                        <p class="text-default-400 mb-2 text-xs">Updated {{ $project->updated_at->diffForHumans() }}</p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="badge badge-label bg-primary/15 text-primary">{{ $project->lifecycle_status }}</span>
                                            <span class="badge badge-label bg-success/15 text-success">{{ $project->attention_state }}</span>
                                            <span class="badge badge-label bg-light text-default-500">{{ $project->project_type }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body px-7.5">
                                    <div class="mb-7.5">
                                        <h5 class="mb-2 font-semibold">Objective</h5>
                                        <p class="text-default-500 whitespace-pre-line">{{ $project->objective ?: "Not provided." }}</p>
                                        @if ($project->scope_summary)
                                            <p class="text-default-400 mt-3 whitespace-pre-line">{{ $project->scope_summary }}</p>
                                        @endif
                                    </div>

                                    <div class="mb-7.5 grid grid-cols-2 gap-base md:grid-cols-4">
                                        <div>
                                            <h6 class="text-default-400 mb-1 text-xs uppercase">Start date</h6>
                                            <p class="font-medium">{{ $project->start_date?->format("M j, Y") ?: "Not planned" }}</p>
                                        </div>
                                        <div>
                                            <h6 class="text-default-400 mb-1 text-xs uppercase">Stop date</h6>
                                            <p class="font-medium">{{ $project->stop_date?->format("M j, Y") ?: "Not planned" }}</p>
                                        </div>
                                        <div>
                                            <h6 class="text-default-400 mb-1 text-xs uppercase">Owner</h6>
                                            <p class="font-medium">{{ $project->ownerProfile?->display_name ?: "Unassigned" }}</p>
                                        </div>
                                        <div>
                                            <h6 class="text-default-400 mb-1 text-xs uppercase">Department</h6>
                                            <p class="font-medium">{{ $project->department?->name ?: "Not selected" }}</p>
                                        </div>
                                    </div>

                                    <div class="border-default-300 border-b">
                                        <nav aria-label="Project workspace tabs" aria-orientation="horizontal" class="flex gap-x-1 overflow-x-auto" role="tablist">
                                            <button aria-controls="deliverables-tab" aria-selected="true" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary active inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#deliverables-tab" id="deliverables" role="tab" type="button">
                                                <i class="iconify tabler--package text-base"></i>
                                                Deliverables <span class="badge bg-light text-default-500">{{ $project->deliverables->count() }}</span>
                                            </button>
                                            <button aria-controls="tasks-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#tasks-tab" id="tasks" role="tab" type="button">
                                                <i class="iconify tabler--list-check text-base"></i>
                                                Tasks
                                            </button>
                                            <button aria-controls="activity-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#activity-tab" id="activity" role="tab" type="button">
                                                <i class="iconify tabler--activity text-base"></i>
                                                Activity
                                            </button>
                                            @if ($project->sourceRequest)
                                                <button aria-controls="conversation-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#conversation-tab" id="conversation" role="tab" type="button">
                                                    <i class="iconify tabler--message-circle text-base"></i>
                                                    Conversation
                                                </button>
                                            @endif
                                        </nav>
                                    </div>

                                    <div class="mt-5">
                                        <div aria-labelledby="deliverables" id="deliverables-tab" role="tabpanel">
                                            <div class="space-y-2">
                                                @forelse ($project->deliverables as $deliverable)
                                                    <div class="border-default-300 rounded border border-dashed p-4">
                                                        <div class="flex flex-wrap items-center justify-between gap-3">
                                                            <div class="min-w-0">
                                                                <p class="font-semibold">{{ $deliverable->title }}</p>
                                                                <p class="text-default-400 mt-1 text-xs">{{ $deliverable->deliverableType?->name ?: "Other" }} · {{ $deliverable->description ?: "Created from the source request." }}</p>
                                                            </div>
                                                            <div class="flex items-center gap-3 text-sm">
                                                                <span class="badge badge-label bg-warning/15 text-warning">{{ $deliverable->lifecycle_status }}</span>
                                                                <span class="text-default-500"><i class="iconify tabler--calendar me-1"></i>{{ $deliverable->due_date?->format("M j, Y") ?: "Not planned" }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="py-10 text-center">
                                                        <i class="iconify tabler--package-off text-default-300 mb-3 size-10"></i>
                                                        <p class="font-semibold">No deliverables yet</p>
                                                        <p class="text-default-400 mt-1 text-sm">Add deliverables as the communication plan is shaped.</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div aria-labelledby="tasks" class="hidden" id="tasks-tab" role="tabpanel">
                                            <div class="bg-light rounded p-7 text-center">
                                                <i class="iconify tabler--list-check text-primary mb-3 size-10"></i>
                                                <h4 class="font-semibold">Tasks will live under Deliverables</h4>
                                                <p class="text-default-400 mx-auto mt-2 max-w-xl text-sm">The Communications Manager will assign Tasks to complete each Deliverable. Task management will be connected after Deliverable ownership, review, and approval routing are in place.</p>
                                            </div>
                                        </div>

                                        <div aria-labelledby="activity" class="hidden" id="activity-tab" role="tabpanel">
                                            <div>
                                                @foreach ($activity as $item)
                                                    <div class="flex gap-x-base">
                                                        <div class="after:border-default-300 relative -ms-px after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e after:border-dashed last:after:hidden">
                                                            <div class="border-default-300 relative z-10 flex size-7.5 items-center justify-center rounded-full border border-dashed">
                                                                <i class="iconify {{ $item["icon"] }} {{ $item["color"] }} text-lg"></i>
                                                            </div>
                                                        </div>
                                                        <div class="min-w-0 flex-1 pb-5">
                                                            <div class="flex flex-wrap items-start justify-between gap-2">
                                                                <h5 class="font-semibold">{{ $item["title"] }}</h5>
                                                                <span class="text-default-400 text-xs">{{ $item["occurred_at"]->format("M j, Y g:i A") }}</span>
                                                            </div>
                                                            <p class="text-default-400 mt-1 text-sm">{{ $item["description"] }}</p>
                                                            @if ($item["actor"])
                                                                <div class="mt-2 flex items-center gap-2">
                                                                    @if ($item["actor"]->avatar_url)
                                                                        <img alt="{{ $item["actor"]->display_name }}" class="size-4 rounded-full object-cover" src="{{ $item["actor"]->avatar_url }}" />
                                                                    @endif
                                                                    <span class="text-xs font-semibold">{{ $item["actor"]->display_name }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        @if ($project->sourceRequest)
                                            <div aria-labelledby="conversation" class="hidden" id="conversation-tab" role="tabpanel">
                                                @include("shared.partials.request-conversation", ["ministryRequest" => $project->sourceRequest, "conversationEmbedded" => true])
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="card h-full lg:rounded-s-none">
                                <div class="card-header"><h4 class="card-title">Project team</h4></div>
                                <div class="card-body">
                                    <div class="mb-6 space-y-4">
                                        @foreach ($project->members as $member)
                                            <div class="flex items-center gap-3">
                                                @if ($member->profile->avatar_url)
                                                    <img alt="{{ $member->profile->display_name }}" class="size-9 rounded-full object-cover" src="{{ $member->profile->avatar_url }}" />
                                                @else
                                                    <span class="bg-light flex size-9 items-center justify-center rounded-full font-semibold">{{ str($member->profile->display_name)->substr(0, 1) }}</span>
                                                @endif
                                                <div class="min-w-0">
                                                    <p class="truncate font-semibold">{{ $member->profile->display_name }}</p>
                                                    <p class="text-default-400 text-xs">{{ $member->project_role }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="border-default-200 border-t pt-5">
                                        <dl class="space-y-4 text-sm">
                                            <div><dt class="text-default-400">Audience</dt><dd class="mt-1 font-medium">{{ $project->audience ?: "Not provided" }}</dd></div>
                                            <div><dt class="text-default-400">Desired action</dt><dd class="mt-1 font-medium">{{ $project->desired_action ?: "Not provided" }}</dd></div>
                                            <div><dt class="text-default-400">Source request</dt><dd class="mt-1 font-medium">@if ($project->sourceRequest)<a class="text-primary hover:underline" href="{{ route("requests.show", $project->sourceRequest) }}">{{ $project->sourceRequest->title }}</a>@else Not linked @endif</dd></div>
                                        </dl>
                                    </div>
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
