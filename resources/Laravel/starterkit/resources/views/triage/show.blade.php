@extends("shared.base", ["title" => $ministryRequest->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Intake Queue", "title" => $ministryRequest->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Intake Queue", "title" => $ministryRequest->title])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <a class="text-primary text-sm hover:underline" href="{{ route("triage.index") }}"><i class="iconify tabler--arrow-left me-1"></i>Back to intake queue</a>
                        <span class="badge {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
                        <div class="space-y-base xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">{{ $ministryRequest->title }}</h4>
                                        <p class="text-default-400 mt-1 text-sm">{{ $ministryRequest->department?->name ?: "No department selected" }} · requested by {{ $ministryRequest->requesterProfile->display_name }}</p>
                                    </div>
                                    <button aria-label="Collapse ministry brief" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="space-y-6">
                                        <div>
                                            <h5 class="mb-2 font-semibold">Ministry need</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->ministry_need }}</p>
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font-semibold">Why it matters</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->why_it_matters ?: "Not provided." }}</p>
                                        </div>
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                            <div><h5 class="mb-2 font-semibold">Audience</h5><p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->audience ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Desired action</h5><p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->desired_action ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Desired tone</h5><p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->desired_tone ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Known constraints</h5><p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->known_constraints ?: "Not provided." }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include("requests._brief-details")

                            @include("shared.partials.request-conversation")
                        </div>

                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Request details</h4>
                                    <button aria-label="Collapse request details" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <dl class="space-y-4 text-sm">
                                        <div><dt class="text-default-400">Requester</dt><dd class="font-medium">{{ $ministryRequest->requesterProfile->display_name }}</dd></div>
                                        <div><dt class="text-default-400">Submitted</dt><dd class="font-medium">{{ $ministryRequest->submitted_at?->format("M j, Y g:i A") ?: "Not recorded" }}</dd></div>
                                        <div><dt class="text-default-400">Communications contact</dt><dd class="font-medium">{{ $ministryRequest->assignedManagerProfile?->display_name ?: "Unassigned" }}</dd></div>
                                        <div><dt class="text-default-400">Support needed by</dt><dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "needed_by") ?: "Not provided" }}</dd></div>
                                        <div><dt class="text-default-400">Audience action deadline</dt><dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "action_deadline") ?: "Not provided" }}</dd></div>
                                    </dl>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Activity</h4>
                                    <button aria-label="Collapse activity" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <ol class="space-y-5 border-s border-default-200 ps-5 text-sm">
                                        <li class="relative">
                                            <span class="bg-default-300 absolute -start-[1.45rem] top-1 size-2 rounded-full"></span>
                                            <p class="font-medium">Request created</p>
                                            <p class="text-default-400">{{ $ministryRequest->created_at->format("M j, Y g:i A") }}</p>
                                        </li>
                                        @if ($ministryRequest->submitted_at)
                                            <li class="relative">
                                                <span class="bg-primary absolute -start-[1.45rem] top-1 size-2 rounded-full"></span>
                                                <p class="font-medium">Request submitted</p>
                                                <p class="text-default-400">{{ $ministryRequest->submitted_at->format("M j, Y g:i A") }}</p>
                                            </li>
                                        @endif
                                        @if (data_get($ministryRequest->missing_information_json, "requested_at"))
                                            <li class="relative">
                                                <span class="bg-warning absolute -start-[1.45rem] top-1 size-2 rounded-full"></span>
                                                <p class="font-medium">Clarification requested</p>
                                                <p class="text-default-400">{{ \Illuminate\Support\Carbon::parse(data_get($ministryRequest->missing_information_json, "requested_at"))->format("M j, Y g:i A") }}</p>
                                            </li>
                                        @endif
                                        @if ($ministryRequest->decision_at)
                                            <li class="relative">
                                                <span class="{{ $ministryRequest->status->dotClass() }} absolute -start-[1.45rem] top-1 size-2 rounded-full"></span>
                                                <p class="font-medium">Request {{ str($ministryRequest->status->value)->lower() }}</p>
                                                <p class="text-default-400">{{ $ministryRequest->decision_at->format("M j, Y g:i A") }}</p>
                                            </li>
                                        @endif
                                        <li class="relative">
                                            <span class="bg-default-300 absolute -start-[1.45rem] top-1 size-2 rounded-full"></span>
                                            <p class="font-medium">Last updated</p>
                                            <p class="text-default-400">{{ $ministryRequest->updated_at->format("M j, Y g:i A") }}</p>
                                        </li>
                                    </ol>
                                    <p class="text-default-400 mt-5 text-xs">This is a current-state activity summary. Full event history will be added with the activity-events foundation.</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Convert to</h4>
                                    <button aria-label="Collapse conversion options" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="text-default-400 mb-4 text-sm">Choose the operational container this request should become.</p>
                                    <select class="form-select" disabled>
                                        <option selected>Select a conversion type</option>
                                        <option>Project</option>
                                        <option>Campaign</option>
                                        <option>Initiative</option>
                                    </select>
                                    <p class="text-default-400 mt-4 text-xs">Conversion creation is the next implementation slice. It will create and link the selected container without losing this request.</p>
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
