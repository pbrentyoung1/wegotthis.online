@extends("shared.base", ["title" => "On Hover Active"])

@section("html_attribute")
    data-sidenav-size="on-hover-active"
@endsection

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Layouts", "title" => "On Hover Active"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Layouts", "title" => "On Hover Active"])

                <div class="container-fluid">
                    <div class="bg-warning/10 text-warning border-s-3 border-warning rounded-md flex items-start gap-3 py-3 px-4 mb-4">
                        <div>
                            <i class="iconify tabler--info-circle text-xl"></i>
                        </div>
                        <div>
                            To enable the full menu on hover after minimizing the sidebar, add
                            <code>data-sidenav-size="on-hover-active"</code>
                            to the
                            <code>&lt;html&gt;</code>
                            tag in your layout.
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-lg">Your custom content here</h4>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
