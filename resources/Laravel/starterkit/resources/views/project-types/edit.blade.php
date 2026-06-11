@extends("shared.base", ["title" => $projectType->name])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Project Types", "title" => $projectType->name])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Project Types", "title" => $projectType->name])
                <div class="container-fluid">
                    <div class="mb-5"><a class="text-primary text-sm hover:underline" href="{{ route("project-types.index") }}"><i class="iconify tabler--arrow-left me-1"></i>Back to project types</a></div>
                    @include("auth.partials.messages")

                    <form action="{{ route("project-types.update", $projectType) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card mb-base">
                            <div class="card-header"><h4 class="card-title">Template details</h4></div>
                            <div class="card-body">
                                <div class="grid grid-cols-1 gap-base md:grid-cols-2">
                                    <div><label class="form-label" for="name">Name</label><input class="form-input" id="name" name="name" required value="{{ old("name", $projectType->name) }}" /></div>
                                    <div class="flex items-end"><label class="flex items-center gap-2"><input @checked(old("is_active", $projectType->is_active)) class="form-checkbox" name="is_active" type="checkbox" value="1" /> Active and available during conversion</label></div>
                                    <div class="md:col-span-2"><label class="form-label" for="description">Description</label><textarea class="form-textarea" id="description" name="description" rows="3">{{ old("description", $projectType->description) }}</textarea></div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div><h4 class="card-title">Default Deliverables</h4><p class="text-default-400 mt-1 text-sm">These become adjustable Proposed Deliverables during conversion.</p></div>
                            </div>
                            <div class="card-body space-y-3">
                                @php($rows = $projectType->deliverableTemplates->concat(collect(array_fill(0, 4, null))))
                                @foreach ($rows as $template)
                                    <div class="border-default-300 grid grid-cols-1 gap-3 rounded border border-dashed p-4 lg:grid-cols-12">
                                        <div class="lg:col-span-3"><label class="form-label">Title</label><input class="form-input" name="deliverables[{{ $loop->index }}][title]" placeholder="Sermon slide" value="{{ $template?->title }}" /></div>
                                        <div class="lg:col-span-2"><label class="form-label">Type</label><select class="form-select" name="deliverables[{{ $loop->index }}][deliverable_type_id]"><option value="">Other</option>@foreach ($deliverableTypes as $type)<option @selected($template?->deliverable_type_id === $type->id) value="{{ $type->id }}">{{ $type->name }}</option>@endforeach</select></div>
                                        <div class="lg:col-span-4"><label class="form-label">Guidance</label><input class="form-input" name="deliverables[{{ $loop->index }}][description]" placeholder="Optional scope note" value="{{ $template?->description }}" /></div>
                                        <div class="lg:col-span-2"><label class="form-label">Days before target</label><input class="form-input" min="0" name="deliverables[{{ $loop->index }}][suggested_due_offset_days]" placeholder="Days" type="number" value="{{ $template?->suggested_due_offset_days }}" /></div>
                                        <div class="flex items-end lg:col-span-1"><label class="flex items-center gap-2 text-xs"><input @checked($template?->is_required) class="form-checkbox" name="deliverables[{{ $loop->index }}][is_required]" type="checkbox" value="1" /> Required</label></div>
                                    </div>
                                @endforeach
                                <div class="pt-2 text-end"><button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">Save project type</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection
