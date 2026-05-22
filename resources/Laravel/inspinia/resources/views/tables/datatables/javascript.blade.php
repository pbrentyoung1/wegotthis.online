@extends("shared.base", ["title" => "Javascript Source"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Tables", "title" => "Javascript Source"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Tables", "title" => "Javascript Source"])

                <div class="container">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Example</h4>
                                <a class="group text-primary font-semibold hover:text-primary-hover" href="https://datatables.net/examples/data_sources/js_array.html" target="_blank">
                                    View Docs
                                    <i class="iconify tabler--arrow-right group-hover:translate-x-1 transform-3d transition-transform duration-300 align-middle text-base"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div aria-labelledby="hs-dismiss-button-label" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-warning/10 text-warning text-sm rounded-lg py-3 px-4 mb-5" id="table-alert" role="alert" tabindex="-1">
                                    <div class="flex items-center">
                                        <div class="ms-2">
                                            <div class="" id="hs-dismiss-button-label">
                                                <strong>Note:</strong>
                                                This is a jQuery-based plugin, so you need to include jQuery for it to work.
                                            </div>
                                        </div>
                                        <div class="ps-3 ms-auto">
                                            <div class="-mx-1.5 -my-1.5">
                                                <button class="" data-hs-remove-element="#table-alert" type="button">
                                                    <span class="sr-only">Dismiss</span>
                                                    <i class="iconify tabler--x text-default-600 size-6"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-wrapper -mb-4">
                                    <table class="table-striped dt-responsive table align-middle" id="datatables-javascript-source">
                                        <thead class="thead-sm text-2xs uppercase">
                                            <tr>
                                                <th>Company</th>
                                                <th>Symbol</th>
                                                <th>Price</th>
                                                <th>Change</th>
                                                <th>Volume</th>
                                                <th>Market Cap</th>
                                                <th>Rating</th>
                                                <th>Status</th>
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
    @vite(["resources/js/pages/datatables-javascript-source.js"])
@endsection
