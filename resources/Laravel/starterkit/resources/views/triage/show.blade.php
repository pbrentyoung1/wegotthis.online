@extends("shared.base", ["title" => $ministryRequest->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Intake Queue", "title" => $ministryRequest->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Intake Queue", "title" => $ministryRequest->title])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("triage.index") }}"><i class="iconify tabler--arrow-left me-1"></i>Back to intake queue</a>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
                        <div class="space-y-base xl:col-span-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-6 flex flex-wrap items-start justify-between gap-3">
                                        <div>
                                            <h3 class="text-xl font-semibold">{{ $ministryRequest->title }}</h3>
                                            <p class="text-default-400 mt-1">{{ $ministryRequest->department?->name ?: "No department selected" }}</p>
                                        </div>
                                        <span class="badge bg-primary/10 text-primary">{{ $ministryRequest->status->value }}</span>
                                    </div>
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

                            @if ($ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification)
                                <div class="rounded-lg bg-warning/10 p-4 text-sm text-warning">
                                    <p class="font-semibold">Clarification requested</p>
                                    <p class="mt-1 whitespace-pre-line">{{ data_get($ministryRequest->missing_information_json, "message") }}</p>
                                </div>
                            @endif

                            @if ($ministryRequest->triage_summary)
                                <div class="rounded-lg bg-info/10 p-4 text-sm text-info">
                                    <p class="font-semibold">Triage summary</p>
                                    <p class="mt-1 whitespace-pre-line">{{ $ministryRequest->triage_summary }}</p>
                                </div>
                            @endif

                            @if ($ministryRequest->decision_notes)
                                <div class="rounded-lg bg-light p-4 text-sm text-default-600">
                                    <p class="font-semibold">Decision notes</p>
                                    <p class="mt-1 whitespace-pre-line">{{ $ministryRequest->decision_notes }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Requester</h4>
                                    <p class="font-semibold">{{ $ministryRequest->requesterProfile->display_name }}</p>
                                    <p class="text-default-400 text-sm">{{ $ministryRequest->requesterProfile->user?->email }}</p>
                                    <dl class="mt-5 space-y-4 text-sm">
                                        <div><dt class="text-default-400">Submitted</dt><dd class="font-medium">{{ $ministryRequest->submitted_at?->format("M j, Y g:i A") ?: "Not recorded" }}</dd></div>
                                        <div><dt class="text-default-400">Assigned manager</dt><dd class="font-medium">{{ $ministryRequest->assignedManagerProfile?->display_name ?: "Unassigned" }}</dd></div>
                                        <div><dt class="text-default-400">Support needed by</dt><dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "needed_by") ?: "Not provided" }}</dd></div>
                                        <div><dt class="text-default-400">Audience action deadline</dt><dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "action_deadline") ?: "Not provided" }}</dd></div>
                                    </dl>
                                </div>
                            </div>

                            @if (in_array($ministryRequest->status, [\App\Enums\RequestStatus::Submitted, \App\Enums\RequestStatus::NeedsClarification, \App\Enums\RequestStatus::Deferred], true))
                                <form action="{{ route("triage.transition", $ministryRequest) }}" class="card" method="POST">
                                    @csrf
                                    <input name="status" type="hidden" value="{{ \App\Enums\RequestStatus::InTriage->value }}" />
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">Start triage</h4>
                                        <p class="text-default-400 mb-4 text-sm">Assign this request to yourself and record the current assessment.</p>
                                        <textarea class="form-textarea mb-4" name="triage_summary" placeholder="Triage summary" rows="3">{{ old("triage_summary", $ministryRequest->triage_summary) }}</textarea>
                                        <button class="btn bg-primary w-full text-white hover:bg-primary-hover" type="submit">Move to In Triage</button>
                                    </div>
                                </form>
                            @endif

                            @if (in_array($ministryRequest->status, [\App\Enums\RequestStatus::Submitted, \App\Enums\RequestStatus::InTriage], true))
                                <form action="{{ route("triage.transition", $ministryRequest) }}" class="card" method="POST">
                                    @csrf
                                    <input name="status" type="hidden" value="{{ \App\Enums\RequestStatus::NeedsClarification->value }}" />
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">Ask for clarification</h4>
                                        <textarea class="form-textarea mb-4" name="notes" placeholder="What information does the requester need to provide?" required rows="4"></textarea>
                                        <button class="btn bg-warning w-full text-white" type="submit">Request information</button>
                                    </div>
                                </form>
                            @endif

                            @if (in_array($ministryRequest->status, [\App\Enums\RequestStatus::Submitted, \App\Enums\RequestStatus::InTriage, \App\Enums\RequestStatus::NeedsClarification, \App\Enums\RequestStatus::Deferred, \App\Enums\RequestStatus::Accepted], true))
                                <form action="{{ route("triage.transition", $ministryRequest) }}" class="card" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">Record decision</h4>
                                        <select class="form-select mb-4" name="status" required>
                                            <option value="">Choose decision</option>
                                            @if ($ministryRequest->status === \App\Enums\RequestStatus::InTriage)
                                                <option value="{{ \App\Enums\RequestStatus::Accepted->value }}">Accept</option>
                                            @endif
                                            @if ($ministryRequest->status !== \App\Enums\RequestStatus::Deferred)
                                                <option value="{{ \App\Enums\RequestStatus::Deferred->value }}">Defer</option>
                                            @endif
                                            @if ($ministryRequest->status !== \App\Enums\RequestStatus::Accepted)
                                                <option value="{{ \App\Enums\RequestStatus::Rejected->value }}">Reject</option>
                                            @endif
                                        </select>
                                        <textarea class="form-textarea mb-4" name="notes" placeholder="Explain the decision to the requester" rows="4"></textarea>
                                        <button class="btn bg-success w-full text-white hover:bg-success-hover" type="submit">Save decision</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection
