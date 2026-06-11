@extends("shared.base", ["title" => "Edit Request"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Requests", "title" => "Edit Request"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Requests", "title" => "Edit Request"])
                <div class="container-fluid">
                    <div class="mx-auto max-w-5xl">
                        <form action="{{ route("requests.update", $ministryRequest) }}" class="card my-5" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                @include("requests._form")
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection

@section("scripts")
    @vite(["resources/js/pages/form-choice.js"])
@endsection
