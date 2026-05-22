@extends("shared.base", ["title" => "Live Favicon"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Plugins", "title" => "Live Favicon"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Plugins", "title" => "Live Favicon"])

                <div class="container">
                    <div class="grid xl:grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Favicon Notification (Tinycon Alternative)</h5>
                            </div>
                            <div class="card-body">
                                <strong>Display Notifications on Favicon</strong>
                                <p class="mt-3 mb-4">Tinycon is a small library that lets you add dynamic notifications to the browser tab favicon. You can show badge counts, change icon colors, and provide visual alerts when the user’s attention is needed.</p>
                                <p class="mb-4">For browsers that don’t support canvas or dynamic favicons, Tinycon automatically falls back to updating the document title with a count.</p>
                                <div class="p-6 text-center *:me-1">
                                    <a class="btn bg-light text-dark hover:text-primary" href="#" id="iconExample1">Set Icon to 1</a>
                                    <a class="btn bg-light text-dark hover:text-primary" href="#" id="iconExample2">Set Icon to 1000</a>
                                    <a class="btn bg-light text-dark hover:text-primary" href="#" id="iconExample3">Set Icon to "In"</a>
                                    <a class="btn bg-primary text-white hover:bg-primary-hover" href="#" id="iconExample4">Set Icon with Custom Color</a>
                                </div>
                                <h4 class="mb-2 text-lg">Options</h4>
                                <p class="mb-4">Tinycon supports the following customization options:</p>
                                <ul class="list-disc ps-8 mb-4">
                                    <li>
                                        <strong>width</strong>
                                        : Width of the badge bubble
                                    </li>
                                    <li>
                                        <strong>height</strong>
                                        : Height of the badge bubble
                                    </li>
                                    <li>
                                        <strong>font</strong>
                                        : CSS font style for the badge text
                                    </li>
                                    <li>
                                        <strong>colour</strong>
                                        : Text color inside the badge
                                    </li>
                                    <li>
                                        <strong>background</strong>
                                        : Background color of the badge
                                    </li>
                                    <li>
                                        <strong>fallback</strong>
                                        : Show count in page title if favicon updates aren't supported
                                    </li>
                                    <li>
                                        <strong>abbreviate</strong>
                                        : Shorten large numbers (e.g., 1000 → 1k)
                                    </li>
                                </ul>
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
    @vite(["resources/js/pages/plugins-tinycon.js"])
@endsection
