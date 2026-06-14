@extends("shared.base", ["title" => "Edit task"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $deliverable->title, "title" => "Edit task"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $deliverable->title, "subtitleUrl" => route("deliverables.show", [$project, $deliverable]), "title" => "Edit task"])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("tasks.show", [$project, $deliverable, $task]) }}">
                            <i class="iconify tabler--arrow-left me-1"></i>Back to task
                        </a>
                    </div>

                    <div class="card mx-auto max-w-4xl">
                        <div class="card-header">
                            <h4 class="card-title">Edit {{ $task->title }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route("tasks.update", [$project, $deliverable, $task]) }}" method="POST">
                                @csrf
                                @method("PATCH")
                                @include("tasks.partials.form", ["submitLabel" => "Save task"])
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
@endsection
