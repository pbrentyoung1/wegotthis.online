@extends("shared.base", ["title" => "Child Row"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Tables", "title" => "Child Row"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Tables", "title" => "Child Row"])

                <div class="container">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Example</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-wrapper -mb-4">
                                    <table class="table table-striped" id="child-rows-data">
                                        <thead class="text-2xs font-semibold uppercase">
                                            <tr>
                                                <th></th>
                                                <th>Company</th>
                                                <th>Symbol</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                                <th>Volume</th>
                                                <th>Market Cap</th>
                                            </tr>
                                        </thead>
                                    </table>
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
    @vite(["resources/js/pages/datatables-child-rows.js"])
@endsection
