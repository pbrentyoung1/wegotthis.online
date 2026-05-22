@extends("shared.base", ["title" => "SweetAlert2"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Plugins", "title" => "SweetAlert2"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Plugins", "title" => "SweetAlert2"])

                <div class="container">
                    <div class="grid xl:grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Examples</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Basic</h5>
                                                    <p class="text-default-400">Displays a simple SweetAlert popup.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="sweetalert-basic" type="button">Click me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Title</h5>
                                                    <p class="text-default-400">A popup with a title and supporting text.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="sweetalert-title" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">HTML</h5>
                                                    <p class="text-default-400">Shows a popup with custom HTML content.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="custom-html-alert" type="button">Toggle HTML SweetAlert</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">All States</h5>
                                                    <p class="text-default-400">Examples of SweetAlert in different alert states.</p>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-3">
                                                        <button class="btn btn-sm bg-info text-white" id="sweetalert-info" type="button">Toggle Info</button>
                                                        <button class="btn btn-sm bg-warning text-white" id="sweetalert-warning" type="button">Toggle Warning</button>
                                                        <button class="btn btn-sm bg-danger text-white hover:bg-danger-hover" id="sweetalert-error" type="button">Toggle Error</button>
                                                        <button class="btn btn-sm bg-success text-white" id="sweetalert-success" type="button">Toggle Success</button>
                                                        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="sweetalert-question" type="button">Toggle Question</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Long Content</h5>
                                                    <p class="text-default-400">A popup with extended content for demonstration.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="sweetalert-longcontent" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">With Confirm Button</h5>
                                                    <p class="text-default-400">A confirmation dialog with an attached action.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="sweetalert-confirm-button" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">With Cancel Button</h5>
                                                    <p class="text-default-400">Includes cancel and confirm options with different actions.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="sweetalert-params" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">With Image Header (Logo)</h5>
                                                    <p class="text-default-400">Custom popup with a logo or image header.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="sweetalert-image" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Auto Close</h5>
                                                    <p class="text-default-400">Displays a popup that closes automatically after a timeout.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="sweetalert-close" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Position</h5>
                                                    <p class="text-default-400">Shows the alert in different screen positions.</p>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-3">
                                                        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-top-start">Top Start</button>
                                                        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-top-end">Top End</button>
                                                        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-bottom-start">Bottom Start</button>
                                                        <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-bottom-end">Bottom End</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">With Custom Padding, Background</h5>
                                                    <p class="text-default-400">Popup with custom dimensions, padding, and background style.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="custom-padding-width-alert" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-1.25">Ajax Request</h5>
                                                    <p class="text-default-400">Demonstrates an alert with an Ajax request.</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" id="ajax-alert" type="button">Click Me</button>
                                                </td>
                                            </tr>
                                        </tbody>
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
    @vite(["resources/js/pages/plugins-sweetalerts.js"])
@endsection
