@extends("shared.base", ["title" => "Empty"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Pages", "title" => "Empty"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>@include("shared.partials.page-title", ["subtitle" => "Pages", "title" => "Empty"])</main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
