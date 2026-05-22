@extends("shared.base", ["title" => "Sparkline Apexcharts"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Sparkline Apexcharts"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Sparkline Apexcharts"])

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div dir="ltr">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-base">
                                    <div class="apex-charts" id="spark1"></div>
                                    <div class="apex-charts" id="spark2"></div>
                                    <div class="apex-charts" id="spark3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper">
                            <table class="table">
                                <thead class="thead-sm bg-light/25 text-xs uppercase">
                                    <tr>
                                        <th>Total Value</th>
                                        <th>Percentage of Portfolio</th>
                                        <th>Last 10 days</th>
                                        <th>Volume</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>$32,554</td>
                                        <td>15%</td>
                                        <td>
                                            <div id="chart1"></div>
                                        </td>
                                        <td>
                                            <div id="chart5"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>$23,533</td>
                                        <td>7%</td>
                                        <td>
                                            <div id="chart2"></div>
                                        </td>
                                        <td>
                                            <div id="chart6"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>$54,276</td>
                                        <td>9%</td>
                                        <td>
                                            <div id="chart3"></div>
                                        </td>
                                        <td>
                                            <div id="chart7"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>$11,533</td>
                                        <td>2%</td>
                                        <td>
                                            <div id="chart4"></div>
                                        </td>
                                        <td>
                                            <div id="chart8"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    @vite(["resources/js/pages/chart-apex-sparklines.js"])
@endsection
