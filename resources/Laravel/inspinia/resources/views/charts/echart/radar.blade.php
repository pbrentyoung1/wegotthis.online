@extends("shared.base", ["title" => "Radar Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Radar Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Radar Echart"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Radar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-basic-radar" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Proportion of Browsers</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-radar1" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customized Radar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-radar2" style="min-height: 300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Multiple Radar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-radar3" style="min-height: 300px"></div>
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
    @vite(["resources/js/pages/chart-echart-radar.js"])
@endsection
