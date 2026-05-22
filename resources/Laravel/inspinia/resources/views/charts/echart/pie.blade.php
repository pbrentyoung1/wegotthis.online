@extends("shared.base", ["title" => "Pie Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Pie Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Pie Echart"])

                <div class="container-fluid">
                    <div class="grid grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Doughnut Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-doughnut-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Doughnut Rounded Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-doughnut-rounded-pie-basic" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multiple Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-multiple-chart" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Label Align Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-label-align-chart" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nightingale Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-nightingale-chart" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Edge Align Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-pie-edge-align-chart" style="min-height: 300px"></div>
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
    @vite(["resources/js/pages/chart-echart-pie.js"])
@endsection
