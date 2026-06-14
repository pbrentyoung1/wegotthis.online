@extends("shared.base", ["title" => "Add Deliverable"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $project->title, "title" => "Add Deliverable"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $project->title, "subtitleUrl" => route("projects.show", $project), "title" => "Add Deliverable"])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("projects.show", $project) }}"><i class="iconify tabler--arrow-left me-1"></i>Back to {{ $project->title }}</a>
                    </div>

                    @include("auth.partials.messages")

                    <div class="mx-auto max-w-2xl">
                        <div class="card">
                            <div class="card-header"><h4 class="card-title">New deliverable</h4></div>
                            <div class="card-body">
                                <form action="{{ route("deliverables.store", $project) }}" method="POST">
                                    @csrf
                                    @include("deliverables.partials.form", ["submitLabel" => "Add deliverable"])
                                </form>
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
