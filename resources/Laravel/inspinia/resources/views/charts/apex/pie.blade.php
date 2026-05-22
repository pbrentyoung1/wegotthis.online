@extends("shared.base", ["title" => "Pie Apexchart"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Charts", "title" => "Pie Apexchart"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Charts", "title" => "Pie Apexchart"])

                <div class="container-fluid">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Simple Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="simple-pie"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Simple Donut Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="simple-donut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Monochrome Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="monochrome-pie"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gradient Donut Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="gradient-donut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patterned Donut Chart</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="patterned-donut"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pie Chart with Image fill</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="image-pie"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Donut Update</h4>
                            </div>
                            <div class="card-body">
                                <div dir="ltr">
                                    <div class="apex-charts" id="update-donut"></div>
                                </div>
                                <div class="mt-2 text-center">
                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="randomize">RANDOMIZE</button>
                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="add">ADD</button>
                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="remove">REMOVE</button>
                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="reset">RESET</button>
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
    @vite(["resources/js/pages/chart-apex-pie.js"])
@endsection
