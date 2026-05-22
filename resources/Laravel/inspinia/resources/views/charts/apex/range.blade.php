@extends("shared.base", ["title" => "Range Apexcharts"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Range Apexcharts"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Range Apexcharts"])

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Range Area</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="basic-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Range Area With Line</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="combo-range"></div>
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

@section("scripts")
    @vite(["resources/js/pages/chart-apex-range.js"])
@endsection
