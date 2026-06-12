@extends("shared.base", ["title" => "Edit Deliverable"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $deliverable->title, "title" => "Edit Deliverable"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $deliverable->title, "title" => "Edit Deliverable"])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("deliverables.show", [$project, $deliverable]) }}"><i class="iconify tabler--arrow-left me-1"></i>Back to {{ $deliverable->title }}</a>
                    </div>

                    @include("auth.partials.messages")

                    <div class="mx-auto max-w-2xl">
                        <div class="card">
                            <div class="card-header"><h4 class="card-title">Edit deliverable</h4></div>
                            <div class="card-body">
                                <form action="{{ route("deliverables.update", [$project, $deliverable]) }}" method="POST">
                                    @csrf
                                    @method("PATCH")
                                    @include("deliverables.partials.form", ["submitLabel" => "Save changes"])
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
