@extends("shared.base", ["title" => "Flags"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "icons", "title" => "Flags"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "icons", "title" => "Flags"])

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h4 class="card-title mb-1.5">Flags Listing (SVG)</h4>
                                <p class="text-default-400">We offer a set of scalable SVG flags, perfect for language selectors and international content.</p>
                            </div>
                            <div class="relative flex items-center">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <i class="iconify tabler--search text-default-400 text-lg"></i>
                                </div>
                                <input class="form-input w-57.5 ps-10" id="countrySearch" placeholder="Search country..." type="search" />
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table w-full text-center align-middle" id="flagTable">
                                    <thead>
                                        <tr class="text-xs font-bold">
                                            <th>Flag</th>
                                            <th>Country Name</th>
                                            <th>Path</th>
                                            <th>Flag</th>
                                            <th>Country Name</th>
                                            <th>Path</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
    @vite(["resources/js/pages/flags-listing.js"])
@endsection
