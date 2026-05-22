@extends("shared.base", ["title" => "Gauge Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Gauge Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Gauge Echart"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-basic-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Speed Stage Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-speed-stage-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ring Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-ring-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Temperature Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-temperature-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multi Ring Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-multiring-gauge" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multi Gauge Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-multi-gauge" style="min-height: 300px"></div>
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
    @vite(["resources/js/pages/chart-echart-gauge.js"])
@endsection
