@extends("shared.base", ["title" => "GEO Maps"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "GEO Maps"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "GEO Maps"])

                <div class="container-fluid">
                    <div class="grid xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">World Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="min-height: 400px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">USA Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="usa-map" style="min-height: 400px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Morphing between Map and Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="map-bar-morphing" style="min-height: 400px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Chart on Geo Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="pie-chart-on-map" style="min-height: 400px"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">GEO SVG Scatter</h4>
                            </div>
                            <div class="card-body">
                                <div id="geo-svg-scatter-map" style="min-height: 400px"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/echarts/map/js/world.js" type="module"></script>
    @vite(["resources/js/pages/chart-echart-geo-map.js"])
@endsection
