@extends("shared.base", ["title" => "Bar Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Bar Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Bar Echart"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-basic-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Two Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="two-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Progress Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="progress-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Horizontal Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-hori-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Negative Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-negative" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar Chart with Series</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-series-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stacked Bar</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-stacked-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Horizontal Stacked Bar</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-horizontal-stacked-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar Race Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-bar-race-chart" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar Gradient Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-bar-gradient" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Mixded Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-mixed-bar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Timeline Bar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-timeline-bar" style="min-height: 500px"></div>
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
    @vite(["resources/js/pages/chart-echart-bar.js"])
@endsection
