@extends("shared.base", ["title" => "Scatter Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Scatter Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Scatter Echart"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Scatter Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-scatter-basic" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bubble Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="echart-bubble-chart" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Quartet Scatter Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="echart-quartet-scatter" style="min-height: 600px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Single Axis Scatter chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="echart-single-axis-scatter" style="min-height: 450px"></div>
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
    @vite(["resources/js/pages/chart-echart-scatter.js"])
@endsection
