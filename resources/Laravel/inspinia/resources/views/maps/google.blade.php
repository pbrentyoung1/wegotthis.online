@extends("shared.base", ["title" => "Google"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Maps", "title" => "Google"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Maps", "title" => "Google"])

                <div class="container-fluid">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="grid xl:grid-cols-2 gap-base">
                            <div class="card">
                                <div class="card-header block">
                                    <h5 class="card-title mb-1.25">Basic Google Map</h5>
                                    <p class="text-default-400">Displays a basic embedded Google Map.</p>
                                </div>
                                <div class="card-body">
                                    <iframe src="https://www.google.com/maps/embed/v1/place?q=Eiffel+Tower&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" style="width: 100%; height: 360px; overflow: hidden; border: 0"></iframe>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header block">
                                    <h5 class="card-title mb-1.25">Street View Google Map</h5>
                                    <p class="text-default-400">Displays a satellite-styled view of the map.</p>
                                </div>
                                <div class="card-body">
                                    <iframe src="https://www.google.com/maps/embed/v1/place?q=Statue+of+Liberty&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4&amp;zoom=18&amp;maptype=satellite" style="width: 100%; height: 360px; overflow: hidden; border: 0"></iframe>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header block">
                                    <h5 class="card-title mb-1.25">Dark Google Map</h5>
                                    <p class="text-default-400">A dark-mode styled map using CSS filters.</p>
                                </div>
                                <div class="card-body">
                                    <iframe src="https://www.google.com/maps/embed/v1/place?q=Sydney+Opera+House&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" style="width: 100%; height: 360px; overflow: hidden; border: 0; filter: invert(100%) hue-rotate(180deg)"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>
@endsection

@section("scripts")
@endsection
