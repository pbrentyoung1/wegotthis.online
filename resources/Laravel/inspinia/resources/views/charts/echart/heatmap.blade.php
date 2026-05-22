@extends("shared.base", ["title" => "Heatmap Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Heatmap Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Heatmap Echart"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap Echart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap3" style="min-height: 300px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Heatmap - 20K Data Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-heatmap4" style="min-height: 300px"></div>
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
    @vite(["resources/js/pages/chart-echart-heatmap.js"])
@endsection
