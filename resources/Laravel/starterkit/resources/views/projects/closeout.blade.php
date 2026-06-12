@extends("shared.base", ["title" => $project->title . " Closeout"])

@section("content")
<div class="wrapper">@include("shared.partials.topbar", ["subtitle" => $project->title, "title" => "Project Closeout"]) @include("shared.partials.sidenav")
<div class="page-content"><main><div class="container-fluid py-6">
    <div class="mb-5"><a class="text-primary text-sm hover:underline" href="{{ route("projects.show", $project) }}"><i class="iconify tabler--arrow-left me-1"></i>Back to project</a></div>
    @include("auth.partials.messages")
    <div class="grid grid-cols-1 gap-base lg:grid-cols-3">
        <div class="card lg:col-span-2">
            <div class="card-header"><div><h4 class="card-title">Closeout checklist</h4><p class="text-default-400 mt-1 text-sm">Preserve the final work and reusable context before archiving.</p></div></div>
            <div class="card-body">
                @if($project->lifecycle_status !== \App\Enums\ProjectStatus::Closeout->value && $project->lifecycle_status !== \App\Enums\ProjectStatus::Archived->value)
                    <p class="text-default-500 mb-4">Closeout can begin after every deliverable is archived.</p>
                    <form action="{{ route("projects.closeout.start", $project) }}" method="POST">@csrf<button class="btn bg-primary text-white" type="submit">Start closeout</button></form>
                @elseif($project->lifecycle_status === \App\Enums\ProjectStatus::Closeout->value)
                    @php($closeout = data_get($project->metadata_json, "closeout", []))
                    <form action="{{ route("projects.closeout.update", $project) }}" class="space-y-5" method="POST">@csrf @method("PATCH")
                        @foreach(["final_links_verified" => "Final links and delivery locations are verified", "approvals_preserved" => "Review decisions and approvals are preserved", "reusable_context_captured" => "Reusable context and lessons learned are captured"] as $key => $label)
                            <label class="flex items-start gap-3 rounded border border-default-200 p-4"><input class="form-checkbox mt-0.5" name="{{ $key }}" type="checkbox" value="1" @checked(data_get($closeout, $key)) /><span>{{ $label }}</span></label>
                        @endforeach
                        <x-rich-text-editor label="Closeout notes and reusable context" name="notes" :value="data_get($closeout, 'notes', '')" />
                        <button class="btn bg-primary text-white" type="submit">Save checklist</button>
                    </form>
                    <form action="{{ route("projects.closeout.archive", $project) }}" class="mt-6 border-t border-default-200 pt-5" method="POST">@csrf<button class="btn bg-success text-white" type="submit">Archive project</button></form>
                @else
                    <p class="text-success"><i class="iconify tabler--archive me-1"></i>This project was archived {{ $project->archived_at?->format("M j, Y") }}.</p>
                @endif
            </div>
        </div>
        <div class="card"><div class="card-header"><h4 class="card-title">Deliverables</h4></div><div class="card-body space-y-3">
            @foreach($project->deliverables as $deliverable)<a class="block rounded border border-default-200 p-3 hover:border-primary" href="{{ route("deliverables.show", [$project, $deliverable]) }}"><span class="font-medium">{{ $deliverable->title }}</span><span class="badge {{ $deliverable->lifecycle_status->badgeClasses() }} mt-2 block w-fit">{{ $deliverable->lifecycle_status->value }}</span></a>@endforeach
        </div></div>
    </div>
</div></main>@include("shared.partials.footer")</div></div>@include("shared.partials.customizer")
@endsection
