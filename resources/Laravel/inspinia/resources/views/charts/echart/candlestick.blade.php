@extends("shared.base", ["title" => "Candlestick Echart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Candlestick Echart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Candlestick Echart"])

                <div class="container-fluid">
                    <div class="space-y-5">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Candlestick Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-basic-candlestick" style="min-height: 400px"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mixed Candlestick Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-mixed-candlestick" style="min-height: 400px"></div>
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
    @vite(["resources/js/pages/chart-echart-candlestick.js"])
@endsection
