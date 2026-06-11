@extends("shared.base", ["title" => "Project Types"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Templates", "title" => "Project Types"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Templates", "title" => "Project Types"])
                <div class="container-fluid">
                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
                        <div class="xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Reusable project defaults</h4>
                                        <p class="text-default-400 mt-1 text-sm">Project Types suggest a starting Deliverable lineup. Managers can adjust it during conversion.</p>
                                    </div>
                                </div>
                                <div class="table-wrapper">
                                    <table class="table table-custom table-centered w-full">
                                        <thead class="bg-light/25 thead-sm"><tr><th>Project type</th><th>Defaults</th><th>Status</th><th class="text-end">Action</th></tr></thead>
                                        <tbody class="divide-default-300 divide-y">
                                            @foreach ($projectTypes as $projectType)
                                                <tr>
                                                    <td><p class="font-semibold">{{ $projectType->name }}</p><p class="text-default-400 text-xs">{{ $projectType->description ?: "No description yet." }}</p></td>
                                                    <td>{{ $projectType->deliverable_templates_count }} Deliverables</td>
                                                    <td><span class="badge {{ $projectType->is_active ? "bg-success/10 text-success" : "bg-light text-default-500" }}">{{ $projectType->is_active ? "Active" : "Inactive" }}</span></td>
                                                    <td class="text-end"><a class="text-primary font-medium hover:underline" href="{{ route("project-types.edit", $projectType) }}">Edit</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Add project type</h4></div>
                                <div class="card-body">
                                    <form action="{{ route("project-types.store") }}" method="POST">
                                        @csrf
                                        <label class="form-label" for="project-type-name">Name</label>
                                        <input class="form-input mb-4" id="project-type-name" name="name" placeholder="Sermon Series" required />
                                        <label class="form-label" for="project-type-description">Description</label>
                                        <textarea class="form-textarea mb-4" id="project-type-description" name="description" placeholder="When this template should be used..." rows="4"></textarea>
                                        <button class="btn w-full bg-primary text-white hover:bg-primary-hover" type="submit">Create project type</button>
                                    </form>
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
