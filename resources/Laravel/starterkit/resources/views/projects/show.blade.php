@extends("shared.base", ["title" => $project->title])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Projects", "title" => $project->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Projects", "title" => $project->title])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <a class="text-primary text-sm hover:underline" href="{{ route("projects.index") }}"><i class="iconify tabler--arrow-left me-1"></i>Back to projects</a>
                        <span class="badge bg-primary/10 text-primary">{{ $project->lifecycle_status }}</span>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
                        <div class="space-y-base xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">{{ $project->title }}</h4>
                                        <p class="text-default-400 mt-1 text-sm">{{ $project->department?->name ?: "No department selected" }} · {{ $project->project_type }}</p>
                                    </div>
                                    <span class="badge bg-success/10 text-success">{{ $project->attention_state }}</span>
                                </div>
                                <div class="card-body">
                                    <div class="space-y-6">
                                        <div>
                                            <h5 class="mb-2 font-semibold">Objective</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $project->objective ?: "Not provided." }}</p>
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font-semibold">Scope summary</h5>
                                            <p class="text-default-500 whitespace-pre-line">{{ $project->scope_summary ?: "Planning is still in progress." }}</p>
                                        </div>
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                            <div><h5 class="mb-2 font-semibold">Audience</h5><p class="text-default-500">{{ $project->audience ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Desired action</h5><p class="text-default-500">{{ $project->desired_action ?: "Not provided." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Start date</h5><p class="text-default-500">{{ $project->start_date?->format("M j, Y") ?: "Not planned." }}</p></div>
                                            <div><h5 class="mb-2 font-semibold">Stop date</h5><p class="text-default-500">{{ $project->stop_date?->format("M j, Y") ?: "Not planned." }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Deliverables</h4>
                                        <p class="text-default-400 mt-1 text-sm">Proposed outputs created from selected request ideas.</p>
                                    </div>
                                </div>
                                <div class="table-wrapper">
                                    <table class="table table-custom table-centered w-full">
                                        <thead class="bg-light/25 thead-sm"><tr><th>Deliverable</th><th>Type</th><th>Status</th><th>Due</th></tr></thead>
                                        <tbody class="divide-default-300 divide-y">
                                            @forelse ($project->deliverables as $deliverable)
                                                <tr>
                                                    <td><p class="font-semibold">{{ $deliverable->title }}</p><p class="text-default-400 text-xs">{{ $deliverable->description ?: "Created from the source request." }}</p></td>
                                                    <td>{{ $deliverable->deliverableType?->name ?: "Other" }}</td>
                                                    <td><span class="badge bg-warning/10 text-warning">{{ $deliverable->lifecycle_status }}</span></td>
                                                    <td>{{ $deliverable->due_date?->format("M j, Y") ?: "Not planned" }}</td>
                                                </tr>
                                            @empty
                                                <tr><td class="py-10 text-center text-default-400" colspan="4">No deliverables were selected during conversion.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if ($project->sourceRequest)
                                @include("shared.partials.request-conversation", ["ministryRequest" => $project->sourceRequest])
                            @endif
                        </div>

                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Project details</h4></div>
                                <div class="card-body">
                                    <dl class="space-y-4 text-sm">
                                        <div><dt class="text-default-400">Owner</dt><dd class="font-medium">{{ $project->ownerProfile?->display_name ?: "Unassigned" }}</dd></div>
                                        <div><dt class="text-default-400">Department</dt><dd class="font-medium">{{ $project->department?->name ?: "Not selected" }}</dd></div>
                                        <div><dt class="text-default-400">Created</dt><dd class="font-medium">{{ $project->created_at->format("M j, Y g:i A") }}</dd></div>
                                        <div><dt class="text-default-400">Source request</dt><dd class="font-medium">@if ($project->sourceRequest)<a class="text-primary hover:underline" href="{{ route("requests.show", $project->sourceRequest) }}">{{ $project->sourceRequest->title }}</a>@else Not linked @endif</dd></div>
                                    </dl>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Project members</h4></div>
                                <div class="card-body space-y-4">
                                    @foreach ($project->members as $member)
                                        <div class="flex items-center gap-3">
                                            @if ($member->profile->avatar_url)
                                                <img alt="{{ $member->profile->display_name }}" class="size-9 rounded-full object-cover" src="{{ $member->profile->avatar_url }}" />
                                            @else
                                                <span class="bg-light flex size-9 items-center justify-center rounded-full font-semibold">{{ str($member->profile->display_name)->substr(0, 1) }}</span>
                                            @endif
                                            <div><p class="font-semibold">{{ $member->profile->display_name }}</p><p class="text-default-400 text-xs">{{ $member->project_role }}</p></div>
                                        </div>
                                    @endforeach
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
