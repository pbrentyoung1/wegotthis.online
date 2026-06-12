@extends("shared.base", ["title" => $deliverable->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $project->title, "title" => $deliverable->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $project->title, "title" => $deliverable->title])
                <div class="container-fluid">
                    <div class="mb-5">
                        @if ($canViewInternal)
                            <a class="text-primary text-sm hover:underline" href="{{ route("projects.show", $project) }}"><i class="iconify tabler--arrow-left me-1"></i>Back to {{ $project->title }}</a>
                        @else
                            <span class="text-default-400 text-sm">{{ $project->title }} · Review workspace</span>
                        @endif
                    </div>

                    @include("auth.partials.messages")

                    @if ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::ReadyForReview || $latestReviews->isNotEmpty())
                        <div class="card border-secondary/30 bg-secondary/5 mb-base border">
                            <div class="card-header flex flex-wrap items-start justify-between gap-3">
                                <div>
                                    <h4 class="card-title"><i class="iconify tabler--clipboard-check text-secondary me-1"></i>Review round {{ $latestRound }}</h4>
                                    <p class="text-default-400 mt-1 text-sm">Each assigned reviewer must approve. Any requested change returns the deliverable to Revision.</p>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($latestReviews as $review)
                                        <span class="badge {{ $review->decision === 'Approved' ? 'bg-success/10 text-success' : ($review->decision === 'Changes Requested' ? 'bg-danger/10 text-danger' : 'bg-secondary/10 text-secondary') }}">
                                            {{ $review->reviewerProfile->display_name }} · {{ $review->decision }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            @if ($latestReviews->whereNotNull('notes')->isNotEmpty())
                                <div class="card-body border-default-200 space-y-2 border-t">
                                    @foreach ($latestReviews->whereNotNull('notes') as $review)
                                        <div class="text-sm"><span class="font-semibold">{{ $review->reviewerProfile->display_name }}:</span><x-rich-text class="mt-1" :value="$review->notes" /></div>
                                    @endforeach
                                </div>
                            @endif
                            @if ($currentReview?->decision === 'Pending' && $deliverable->lifecycle_status === \App\Enums\DeliverableStatus::ReadyForReview)
                                <div class="card-body border-default-200 border-t">
                                    <form action="{{ route('deliverables.review.decision', [$project, $deliverable]) }}" method="POST">
                                        @csrf
                                        <x-rich-text-editor label="Review notes" name="notes" placeholder="Required when requesting changes. Optional when approving." />
                                        <div class="mt-3 flex flex-wrap justify-end gap-2">
                                            <button class="btn bg-light text-danger hover:bg-danger/10" name="decision" type="submit" value="Changes Requested"><i class="iconify tabler--message-exclamation me-1"></i>Request changes</button>
                                            <button class="btn bg-success text-white" name="decision" type="submit" value="Approved"><i class="iconify tabler--check me-1"></i>Approve</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-4 lg:gap-0">
                        <div class="lg:col-span-3">
                            <div class="card h-full">
                                <div class="card-header flex flex-wrap items-start gap-base p-7.5">
                                    <div class="{{ $deliverable->lifecycle_status->badgeClasses() }} me-3 flex size-16 items-center justify-center rounded bg-opacity-10 text-opacity-100">
                                        <i class="iconify tabler--package text-3xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="mb-1 text-lg font-semibold">{{ $deliverable->title }}</h3>
                                        <p class="text-default-400 mb-2 text-xs">Updated {{ $deliverable->updated_at->diffForHumans() }}</p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="badge badge-label {{ $deliverable->lifecycle_status->badgeClasses() }}">{{ $deliverable->lifecycle_status->value }}</span>
                                            <span class="badge badge-label bg-light text-default-500">{{ $deliverable->deliverableType?->name ?: "Other" }}</span>
                                            @if ($deliverable->attention_state !== "On Track")
                                                <span class="badge badge-label bg-danger/10 text-danger">{{ $deliverable->attention_state }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($currentProfile->hasPermission("projects.manage") || $canStartProduction || $canSubmitReview)
                                        <div class="flex gap-2">
                                            @if ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::Proposed)
                                                <form action="{{ route("deliverables.plan", [$project, $deliverable]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" type="submit">Move to Planning</button>
                                                </form>
                                            @endif
                                            @if ($canStartProduction)
                                                <form action="{{ route('deliverables.production.start', [$project, $deliverable]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm bg-warning text-white" type="submit"><i class="iconify tabler--tools me-1"></i>Start production</button>
                                                </form>
                                            @endif
                                            @if ($canSubmitReview)
                                                <form action="{{ route('deliverables.review.submit', [$project, $deliverable]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm bg-secondary text-white" type="submit"><i class="iconify tabler--send me-1"></i>Submit for review</button>
                                                </form>
                                            @endif
                                            @if ($currentProfile->hasPermission("projects.manage"))
                                                <a class="btn btn-sm bg-light text-default-600 hover:text-primary" href="{{ route("deliverables.edit", [$project, $deliverable]) }}">
                                                    <i class="iconify tabler--pencil me-1"></i>Edit
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body px-7.5">
                                    <div class="border-default-300 border-b">
                                        <nav aria-label="Deliverable workspace tabs" aria-orientation="horizontal" class="flex gap-x-1 overflow-x-auto" role="tablist">
                                            <button aria-controls="brief-tab" aria-selected="true" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary active inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#brief-tab" id="brief" role="tab" type="button">
                                                <i class="iconify tabler--clipboard-text text-base"></i>
                                                Brief
                                            </button>
                                            @if ($canViewInternal)
                                                <button aria-controls="deliverable-tasks-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#deliverable-tasks-tab" id="deliverable-tasks" role="tab" type="button">
                                                    <i class="iconify tabler--list-check text-base"></i>
                                                    Tasks <span class="badge bg-light text-default-500">{{ $deliverable->tasks->count() }}</span>
                                                </button>
                                                <button aria-controls="team-conversation-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#team-conversation-tab" id="team-conversation" role="tab" type="button">
                                                    <i class="iconify tabler--message-circle text-base"></i>
                                                    Team Discussion
                                                </button>
                                                <button aria-controls="deliverable-activity-tab" aria-selected="false" class="hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary hover:text-primary inline-flex items-center gap-2 border-b border-transparent px-4 py-2 text-sm whitespace-nowrap focus:outline-hidden" data-hs-tab="#deliverable-activity-tab" id="deliverable-activity" role="tab" type="button">
                                                    <i class="iconify tabler--activity text-base"></i>
                                                    Activity
                                                </button>
                                            @endif
                                        </nav>
                                    </div>

                                    <div class="mt-5">
                                        <div aria-labelledby="brief" id="brief-tab" role="tabpanel">
                                            <div class="space-y-6">
                                                @if ($deliverable->description)
                                                    <div>
                                                        <h5 class="text-default-400 mb-1 text-xs uppercase">Description / Brief</h5>
                                                        <x-rich-text :value="$deliverable->description" />
                                                    </div>
                                                @endif
                                                @if ($deliverable->purpose)
                                                    <div>
                                                        <h5 class="text-default-400 mb-1 text-xs uppercase">Purpose</h5>
                                                        <x-rich-text :value="$deliverable->purpose" />
                                                    </div>
                                                @endif
                                                @if ($deliverable->audience)
                                                    <div>
                                                        <h5 class="text-default-400 mb-1 text-xs uppercase">Audience</h5>
                                                        <p class="text-default-600">{{ $deliverable->audience }}</p>
                                                    </div>
                                                @endif
                                                @if ($deliverable->desired_action)
                                                    <div>
                                                        <h5 class="text-default-400 mb-1 text-xs uppercase">Desired action</h5>
                                                        <p class="text-default-600">{{ $deliverable->desired_action }}</p>
                                                    </div>
                                                @endif
                                                @if (! $deliverable->description && ! $deliverable->purpose && ! $deliverable->audience && ! $deliverable->desired_action)
                                                    <p class="text-default-400 text-sm">No brief details yet. @if ($currentProfile->hasPermission("projects.manage"))<a class="text-primary hover:underline" href="{{ route("deliverables.edit", [$project, $deliverable]) }}">Add them now.</a>@endif</p>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($canViewInternal)
                                        <div aria-labelledby="deliverable-tasks" class="hidden" id="deliverable-tasks-tab" role="tabpanel">
                                            <div class="mb-4 flex items-center justify-between gap-3">
                                                <p class="text-default-400 text-sm">Time budget: <span class="font-semibold text-default-600">{{ $deliverable->timeBudgetMinutes() }} minutes</span></p>
                                                @if ($currentProfile->hasPermission("tasks.create") || $deliverable->owner_profile_id === $currentProfile->id)
                                                    <a class="btn btn-sm bg-primary text-white" href="{{ route('tasks.create', [$project, $deliverable]) }}"><i class="iconify tabler--plus me-1"></i>Add task</a>
                                                @endif
                                            </div>
                                            <div class="space-y-2">
                                                @forelse ($deliverable->tasks as $task)
                                                    <a class="{{ $task->taskType()->cardClasses() }} block rounded border border-dashed p-4" href="{{ route('tasks.show', [$project, $deliverable, $task]) }}">
                                                        <div class="flex flex-wrap items-center justify-between gap-3">
                                                            <div><p class="font-semibold"><i class="iconify {{ $task->taskType()->icon() }} me-1"></i>{{ $task->title }}</p><p class="text-default-400 mt-1 text-xs">{{ $task->assigneeProfile?->display_name ?: 'Unassigned' }} · {{ $task->priority ?: 'Normal' }} priority · {{ $task->formattedTimeBudget() }} · {{ $task->taskType()->label() }}</p></div>
                                                            <div class="flex items-center gap-3"><span class="badge {{ $task->status->badgeClasses() }}">{{ $task->status->value }}</span><span class="text-default-500 text-sm">{{ $task->due_date?->format('M j') ?: 'No due date' }}</span></div>
                                                        </div>
                                                    </a>
                                                @empty
                                                    <p class="text-default-400 py-8 text-center text-sm">No Tasks yet.</p>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div aria-labelledby="team-conversation" class="hidden" id="team-conversation-tab" role="tabpanel">
                                            @include("shared.partials.deliverable-conversation")
                                        </div>

                                        <div aria-labelledby="deliverable-activity" class="hidden" id="deliverable-activity-tab" role="tabpanel">
                                            <div>
                                                @forelse ($deliverable->activityEvents as $event)
                                                    <div class="flex gap-x-base">
                                                        <div class="after:border-default-300 relative -ms-px after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e after:border-dashed last:after:hidden">
                                                            <div class="border-default-300 relative z-10 flex size-7.5 items-center justify-center rounded-full border border-dashed">
                                                                <i class="iconify {{ $event->icon() }} {{ $event->color() }} text-lg"></i>
                                                            </div>
                                                        </div>
                                                        <div class="min-w-0 flex-1 pb-5">
                                                            <div class="flex flex-wrap items-start justify-between gap-2">
                                                                <h5 class="font-semibold">{{ $event->title() }}</h5>
                                                                <span class="text-default-400 text-xs">{{ $event->occurred_at->format("M j, Y g:i A") }}</span>
                                                            </div>
                                                            <p class="text-default-400 mt-1 text-sm">{{ $event->description }}</p>
                                                            @if ($event->actorProfile)
                                                                <div class="mt-2 flex items-center gap-2">
                                                                    @if ($event->actorProfile->avatar_url)
                                                                        <img alt="{{ $event->actorProfile->display_name }}" class="size-4 rounded-full object-cover" src="{{ $event->actorProfile->avatar_url }}" />
                                                                    @endif
                                                                    <span class="text-xs font-semibold">{{ $event->actorProfile->display_name }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-default-400 text-center text-sm py-6">No recorded activity yet.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="card lg:rounded-s-none">
                                <div class="card-header"><h4 class="card-title">Deliverable details</h4></div>
                                <div class="card-body">
                                    <dl class="space-y-4 text-sm">
                                        <div>
                                            <dt class="text-default-400">Owner</dt>
                                            <dd class="mt-1 font-medium">
                                                @if ($deliverable->ownerProfile)
                                                    <div class="flex items-center gap-2">
                                                        @if ($deliverable->ownerProfile->avatar_url)
                                                            <img alt="{{ $deliverable->ownerProfile->display_name }}" class="size-6 rounded-full object-cover" src="{{ $deliverable->ownerProfile->avatar_url }}" />
                                                        @else
                                                            <span class="bg-light flex size-6 items-center justify-center rounded-full text-xs font-semibold">{{ str($deliverable->ownerProfile->display_name)->substr(0, 1) }}</span>
                                                        @endif
                                                        {{ $deliverable->ownerProfile->display_name }}
                                                    </div>
                                                @else
                                                    <span class="text-default-400">Unassigned</span>
                                                @endif
                                            </dd>
                                        </div>
                                        @if ($deliverable->internalReviewerProfile)
                                            <div>
                                                <dt class="text-default-400">Internal reviewer</dt>
                                                <dd class="mt-1 font-medium">{{ $deliverable->internalReviewerProfile->display_name }}</dd>
                                            </div>
                                        @endif
                                        @if ($deliverable->stakeholderReviewerProfile)
                                            <div>
                                                <dt class="text-default-400">Stakeholder reviewer</dt>
                                                <dd class="mt-1 font-medium">{{ $deliverable->stakeholderReviewerProfile->display_name }}</dd>
                                            </div>
                                        @endif
                                        <div>
                                            <dt class="text-default-400">Due date</dt>
                                            <dd class="mt-1 font-medium">{{ $deliverable->due_date?->format("M j, Y") ?: "Not set" }}</dd>
                                        </div>
                                        @if ($deliverable->publish_date)
                                            <div>
                                                <dt class="text-default-400">Publish date</dt>
                                                <dd class="mt-1 font-medium">{{ $deliverable->publish_date->format("M j, Y") }}</dd>
                                            </div>
                                        @endif
                                        @if ($canViewInternal)
                                        <div>
                                            <dt class="text-default-400">Project</dt>
                                            <dd class="mt-1 font-medium"><a class="text-primary hover:underline" href="{{ route("projects.show", $project) }}">{{ $project->title }}</a></dd>
                                        </div>
                                        @endif
                                    </dl>

                                    @if ($currentProfile->hasPermission("projects.manage") && $deliverable->lifecycle_status === \App\Enums\DeliverableStatus::Proposed)
                                        <div class="border-default-200 mt-5 border-t pt-5">
                                            <p class="text-default-400 mb-3 text-xs">This deliverable is Proposed. Assign an owner and due date, then move it to Planning when ready.</p>
                                            <form action="{{ route("deliverables.plan", [$project, $deliverable]) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm w-full bg-primary text-white hover:bg-primary-hover" type="submit">Move to Planning</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if ($canManageLifecycle && in_array($deliverable->lifecycle_status, [
                                \App\Enums\DeliverableStatus::Approved,
                                \App\Enums\DeliverableStatus::Delivery,
                                \App\Enums\DeliverableStatus::PublishedRunning,
                                \App\Enums\DeliverableStatus::Ended,
                            ], true))
                                <div class="card mt-base lg:rounded-s-none">
                                    <div class="card-header"><h4 class="card-title">Next lifecycle action</h4></div>
                                    <div class="card-body">
                                        @if ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::Approved)
                                            <p class="text-default-400 mb-3 text-sm">Begin scheduling, exporting, printing, uploading, installation, or handoff.</p>
                                            <form action="{{ route('deliverables.delivery.start', [$project, $deliverable]) }}" method="POST">
                                                @csrf
                                                <button class="btn w-full bg-primary text-white" type="submit"><i class="iconify tabler--truck-delivery me-1"></i>Start delivery</button>
                                            </form>
                                        @elseif ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::Delivery)
                                            <p class="text-default-400 mb-3 text-sm">Add a final link below or record a delivery note before marking this complete.</p>
                                            <form action="{{ route('deliverables.published.mark', [$project, $deliverable]) }}" method="POST">
                                                @csrf
                                                <label class="form-label" for="delivery_note">Delivery note</label>
                                                <textarea class="form-textarea mb-3" id="delivery_note" name="delivery_note" placeholder="Where was it published, delivered, installed, sent, or handed off?" rows="3">{{ old('delivery_note', $deliverable->metadata_json['delivery_note'] ?? '') }}</textarea>
                                                @error('delivery_note')<p class="form-error mb-3">{{ $message }}</p>@enderror
                                                <button class="btn w-full bg-primary text-white" type="submit"><i class="iconify tabler--world-upload me-1"></i>Mark published / delivered</button>
                                            </form>
                                        @elseif ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::PublishedRunning)
                                            <p class="text-default-400 mb-3 text-sm">End the deliverable when it is no longer live, active, distributed, or in use.</p>
                                            <form action="{{ route('deliverables.end', [$project, $deliverable]) }}" method="POST">
                                                @csrf
                                                <button class="btn w-full bg-light text-default-600" type="submit"><i class="iconify tabler--player-stop me-1"></i>End deliverable</button>
                                            </form>
                                        @elseif ($deliverable->lifecycle_status === \App\Enums\DeliverableStatus::Ended)
                                            <p class="text-default-400 mb-3 text-sm">Archive after final links, notes, and reusable context have been verified.</p>
                                            <form action="{{ route('deliverables.archive', [$project, $deliverable]) }}" method="POST">
                                                @csrf
                                                <button class="btn w-full bg-light text-default-600" type="submit"><i class="iconify tabler--archive me-1"></i>Archive deliverable</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if ($deliverable->metadata_json['delivery_note'] ?? null)
                                <div class="card mt-base lg:rounded-s-none">
                                    <div class="card-header"><h4 class="card-title">Delivery note</h4></div>
                                    <div class="card-body"><p class="text-default-600 whitespace-pre-line text-sm">{{ $deliverable->metadata_json['delivery_note'] }}</p></div>
                                </div>
                            @endif

                            <div class="card mt-base lg:rounded-s-none">
                                <div class="card-header"><h4 class="card-title">Links</h4></div>
                                <div class="card-body">
                                    @if ($deliverable->links->isNotEmpty())
                                        <ul class="mb-4 space-y-2">
                                            @foreach ($deliverable->links as $link)
                                                <li class="flex items-center justify-between gap-2 text-sm">
                                                    <a class="text-primary min-w-0 flex-1 truncate hover:underline" href="{{ $link->url }}" rel="noopener noreferrer" target="_blank">
                                                        <i class="iconify tabler--external-link me-1 shrink-0"></i>{{ $link->displayLabel() }}
                                                    </a>
                                                    @if ($currentProfile->hasPermission("projects.manage"))
                                                        <form action="{{ route("deliverables.links.destroy", [$project, $deliverable, $link]) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button aria-label="Remove link" class="text-default-300 hover:text-danger shrink-0" type="submit">
                                                                <i class="iconify tabler--x text-base"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-default-400 mb-4 text-sm">No links yet.</p>
                                    @endif

                                    @if ($currentProfile->hasPermission("projects.manage"))
                                        <form action="{{ route("deliverables.links.store", [$project, $deliverable]) }}" method="POST">
                                            @csrf
                                            <div class="space-y-2">
                                                <input class="form-input text-sm @error('url') is-invalid @enderror" name="url" placeholder="https://..." type="url" value="{{ old('url') }}" />
                                                @error('url')
                                                    <p class="form-error">{{ $message }}</p>
                                                @enderror
                                                <input class="form-input text-sm @error('label') is-invalid @enderror" name="label" placeholder="Label (optional)" type="text" value="{{ old('label') }}" />
                                                @error('label')
                                                    <p class="form-error">{{ $message }}</p>
                                                @enderror
                                                <button class="btn btn-sm w-full bg-light text-default-600 hover:text-primary" type="submit">
                                                    <i class="iconify tabler--plus me-1"></i>Add link
                                                </button>
                                            </div>
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
