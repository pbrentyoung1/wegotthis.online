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
                                            <x-rich-text :value="$ministryRequest->ministry_need" />
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font-semibold">Why it matters</h5>
                                            @if($ministryRequest->why_it_matters)<x-rich-text :value="$ministryRequest->why_it_matters" />@else<p class="text-default-500">Not provided.</p>@endif
                                        </div>
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                            <div><h5 class="mb-2 font-semibold">Audience</h5><p class="text-default-500 whitespace-pre-line">{{ $ministryRequest->audience ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Desired action</h5>@if($ministryRequest->desired_action)<x-rich-text :value="$ministryRequest->desired_action" />@else<p class="text-default-500">Not provided.</p>@endif</div>
                                            <div><h5 class="mb-2 font-semibold">Desired tone</h5>@if($ministryRequest->desired_tone)<x-rich-text :value="$ministryRequest->desired_tone" />@else<p class="text-default-500">Not provided.</p>@endif</div>
                                            <div><h5 class="mb-2 font-semibold">Planning considerations</h5>@if($ministryRequest->known_constraints)<x-rich-text :value="$ministryRequest->known_constraints" />@else<p class="text-default-500">Not provided.</p>@endif</div>
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
                                    @if ($ministryRequest->convertedProject)
                                        <p class="text-default-400 mb-4 text-sm">This request has been converted and preserved as the source brief.</p>
                                        <a class="btn bg-success text-white hover:bg-success-hover" href="{{ route("projects.show", $ministryRequest->convertedProject) }}">
                                            Open project
                                            <i class="iconify tabler--arrow-right ms-1"></i>
                                        </a>
                                    @elseif (in_array($ministryRequest->status, [
                                        \App\Enums\RequestStatus::Submitted,
                                        \App\Enums\RequestStatus::InTriage,
                                        \App\Enums\RequestStatus::Accepted,
                                    ], true))
                                        <form action="{{ route("triage.convert", $ministryRequest) }}" method="POST">
                                            @csrf
                                            @if ($ministryRequest->status !== \App\Enums\RequestStatus::Accepted)
                                                <div class="bg-primary/10 text-primary mb-4 rounded p-3 text-sm">
                                                    Converting this request records the acceptance decision and creates the Project.
                                                </div>
                                            @endif
                                            <label class="form-label" for="conversion-target">Conversion target</label>
                                            <select class="form-select mb-4" id="conversion-target" disabled>
                                                <option selected>Project</option>
                                                <option>Campaign · coming later</option>
                                                <option>Initiative · coming later</option>
                                            </select>

                                            <label class="form-label" for="conversion-title">Project title</label>
                                            <input class="form-input mb-4" id="conversion-title" name="title" required type="text" value="{{ old("title", $ministryRequest->title) }}" />

                                            <label class="form-label" for="conversion-project-type">Project type</label>
                                            <select class="form-select mb-4" id="conversion-project-type" name="project_type_id">
                                                <option value="">No template</option>
                                                @foreach ($projectTypes as $projectType)
                                                    <option @selected((string) old("project_type_id") === (string) $projectType->id) value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                                                @endforeach
                                            </select>

                                            <div class="mb-4">
                                                <p class="mb-2 text-sm font-semibold">Template defaults</p>
                                                <p class="text-default-400 mb-3 text-xs">Choose a Project Type to preview its defaults. Uncheck anything that does not belong in this Project.</p>
                                                @foreach ($projectTypes as $projectType)
                                                    <div class="hidden space-y-2" data-project-type-defaults="{{ $projectType->id }}">
                                                        @forelse ($projectType->deliverableTemplates as $template)
                                                            <label class="bg-primary/5 flex cursor-pointer items-start gap-2 rounded p-3 text-sm">
                                                                <input class="form-checkbox mt-0.5" data-template-deliverable checked disabled name="template_deliverable_ids[]" type="checkbox" value="{{ $template->id }}" />
                                                                <span><span class="font-medium">{{ $template->title }}</span> <span class="text-default-400">· {{ $template->deliverableType?->name ?: "Other" }}</span>@if ($template->description)<span class="text-default-400 mt-1 block text-xs">{{ $template->description }}</span>@endif</span>
                                                            </label>
                                                        @empty
                                                            <p class="text-default-400 text-sm">This Project Type has no default Deliverables.</p>
                                                        @endforelse
                                                    </div>
                                                @endforeach
                                                @if ($projectTypes->isEmpty())
                                                    <p class="text-default-400 text-sm">No Project Types exist yet. <a class="text-primary hover:underline" href="{{ route("project-types.index") }}">Create one</a>.</p>
                                                @endif
                                            </div>

                                            <p class="mb-2 text-sm font-semibold">Proposed deliverables</p>
                                            <div class="mb-4 space-y-2">
                                                @forelse ($ministryRequest->ideas as $idea)
                                                    <label class="bg-light flex cursor-pointer items-center gap-2 rounded p-3 text-sm">
                                                        <input class="form-checkbox" checked name="idea_ids[]" type="checkbox" value="{{ $idea->id }}" />
                                                        <span>{{ $idea->title }} <span class="text-default-400">· {{ $idea->idea_type }}</span></span>
                                                    </label>
                                                @empty
                                                    <p class="text-default-400 text-sm">No proposed deliverables were added during intake.</p>
                                                @endforelse
                                            </div>

                                            <div class="bg-light mb-4 rounded p-3 text-xs">
                                                <p><span class="font-semibold">Owner:</span> {{ $currentProfile->display_name }}</p>
                                                <p class="mt-1"><span class="font-semibold">Stakeholder:</span> {{ $ministryRequest->requesterProfile->display_name }}</p>
                                            </div>

                                            <button class="btn w-full bg-primary text-white hover:bg-primary-hover" type="submit">Convert to project</button>
                                        </form>
                                    @else
                                        <p class="text-default-400 mb-4 text-sm">Resolve the current request status before converting it into operational work.</p>
                                        <select class="form-select" disabled>
                                            <option selected>Select a conversion type</option>
                                            <option>Project</option>
                                            <option>Campaign</option>
                                            <option>Initiative</option>
                                        </select>
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const projectType = document.getElementById("conversion-project-type")
            if (!projectType) return

            const updateTemplateDefaults = () => {
                document.querySelectorAll("[data-project-type-defaults]").forEach((group) => {
                    const selected = group.dataset.projectTypeDefaults === projectType.value
                    group.classList.toggle("hidden", !selected)
                    group.querySelectorAll("[data-template-deliverable]").forEach((checkbox) => checkbox.disabled = !selected)
                })
            }

            projectType.addEventListener("change", updateTemplateDefaults)
            updateTemplateDefaults()
        })
    </script>
@endsection
