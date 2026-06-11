@extends("shared.base", ["title" => $ministryRequest->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Requests", "title" => $ministryRequest->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Requests", "title" => $ministryRequest->title])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <a class="text-primary text-sm hover:underline" href="{{ route("requests.index") }}">
                            <i class="iconify tabler--arrow-left me-1"></i>
                            Back to my requests
                        </a>
                        @if (in_array($ministryRequest->status, [\App\Enums\RequestStatus::Draft, \App\Enums\RequestStatus::NeedsClarification], true))
                            <div class="flex gap-2">
                                <a class="btn bg-light text-default-700 hover:bg-default-200" href="{{ route("requests.edit", $ministryRequest) }}">{{ $ministryRequest->status === \App\Enums\RequestStatus::Draft ? "Edit draft" : "Update request details" }}</a>
                                <form action="{{ route("requests.submit", $ministryRequest) }}" method="POST">
                                    @csrf
                                    <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">{{ $ministryRequest->status === \App\Enums\RequestStatus::Draft ? "Submit request" : "Resubmit request" }}</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
                        <div class="space-y-base xl:col-span-2">
                            <div class="card">
                                <div class="card-body">
                                    @include("auth.partials.messages")
                                    <div class="mb-5 flex flex-wrap items-start justify-between gap-3">
                                        <div>
                                            <h3 class="text-xl font-semibold">{{ $ministryRequest->title }}</h3>
                                            <p class="text-default-400 mt-1">{{ $ministryRequest->department?->name ?: "No department selected" }}</p>
                                        </div>
                                        <span class="badge {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span>
                                    </div>

                                    <div class="space-y-6">
                                        <div>
                                            <h5 class="mb-2 font-semibold">Ministry need</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->ministry_need ?: "Not provided yet." }}</p>
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font-semibold">Why it matters</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->why_it_matters ?: "Not provided yet." }}</p>
                                        </div>
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                            <div>
                                                <h5 class="mb-2 font-semibold">Audience</h5>
                                                <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->audience ?: "Not provided yet." }}</p>
                                            </div>
                                            <div>
                                                <h5 class="mb-2 font-semibold">Desired action</h5>
                                                <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->desired_action ?: "Not provided yet." }}</p>
                                            </div>
                                            <div>
                                                <h5 class="mb-2 font-semibold">Desired tone</h5>
                                                <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->desired_tone ?: "Not provided yet." }}</p>
                                            </div>
                                            <div>
                                                <h5 class="mb-2 font-semibold">Planning considerations</h5>
                                                <p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->known_constraints ?: "Not provided yet." }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include("requests._brief-details")

                            @include("shared.partials.request-conversation")
                        </div>

                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Request details</h4>
                                    <dl class="space-y-4 text-sm">
                                        <div>
                                            <dt class="text-default-400">Status</dt>
                                            <dd class="font-medium">{{ $ministryRequest->status->value }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Event or launch date</dt>
                                            <dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "event_date") ?: "Not provided" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Support needed by</dt>
                                            <dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "needed_by") ?: "Not provided" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Audience action deadline</dt>
                                            <dd class="font-medium">{{ data_get($ministryRequest->key_dates_json, "action_deadline") ?: "Not provided" }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-default-400">Submitted</dt>
                                            <dd class="font-medium">{{ $ministryRequest->submitted_at?->format("M j, Y g:i A") ?: "Not submitted" }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            @if ($ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification)
                                <div class="rounded-lg bg-warning/10 p-4 text-sm text-warning">
                                    <p class="font-semibold">Communications needs more information:</p>
                                    <p class="mt-1 whitespace-pre-line">{{ data_get($ministryRequest->missing_information_json, "message") }}</p>
                                </div>
                            @endif

                            @if ($ministryRequest->decision_notes)
                                <div class="rounded-lg bg-light p-4 text-sm text-default-600">
                                    <p class="font-semibold">Decision notes</p>
                                    <p class="mt-1 whitespace-pre-line">{{ $ministryRequest->decision_notes }}</p>
                                </div>
                            @endif

                            <div class="rounded-lg bg-info/10 p-4 text-sm text-info">
                                @if ($ministryRequest->status === \App\Enums\RequestStatus::Draft)
                                    Your request is private until you submit it. Add the ministry need before submitting.
                                @elseif ($ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification)
                                    Update the request with the requested information, then resubmit it to Communications.
                                @else
                                    The communications team can now review this request and follow up if clarification is needed.
                                @endif
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
