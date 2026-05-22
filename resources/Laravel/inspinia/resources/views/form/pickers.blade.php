@extends("shared.base", ["title" => "Pickers"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Forms", "title" => "Pickers"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Forms", "title" => "Pickers"])

                <div class="container">
                    <div class="grid grid-cols-1 gap-base">
                        <div class="card">
                            <div class="card-header block">
                                <h4 class="card-title mb-1.25">Flatpickr</h4>
                                <p class="text-default-400">Lightweight, powerful javascript datetimepicker with no dependencies</p>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mb-7.5 text-sm">Datepicker</h4>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Basic</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-date-format="d M, Y"</code>
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-provider="flatpickr" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">DateTime</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-date-format="d.m.y" data-enable-time.</code>
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d.m.y" data-enable-time="" data-provider="flatpickr" placeholder="Select date &amp; time" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Human-Friendly Dates</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-altFormat="F j, Y".</code>
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-altformat="F j, Y" data-provider="flatpickr" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">MinDate and MaxDate</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-date-format="d M, Y" data-minDate="..." data-maxDate="...".</code>
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-maxdate="29 12,2021" data-mindate="25 12, 2021" data-provider="flatpickr" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Default Date</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-default-date="..."</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-default-date="25 12,2021" data-provider="flatpickr" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Disabling Dates</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-disable-date="..."</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-disable-date="15 12,2021" data-provider="flatpickr" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Selecting Multiple Dates</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-multiple-date="true"</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-multiple-date="true" data-provider="flatpickr" placeholder="Select multiple dates" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Range</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-range-date="true"</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-provider="flatpickr" data-range-date="true" placeholder="Select date range" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Week Numbers</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-week-number</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-provider="flatpickr" data-week-number="" placeholder="Select date" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Inline</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="flatpickr" data-inline-date="true"</code>
                                            .
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-date-format="d M, Y" data-default-date="25 01,2021" data-inline-date="true" data-provider="flatpickr" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-default-300 border-t"></div>
                            <div class="card-body">
                                <h4 class="card-title mb-7.5">Timepicker</h4>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Timepicker</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="timepickr" data-time-basic="true"</code>
                                            attribute.
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-provider="timepickr" data-time-basic="true" id="timepicker-example" placeholder="Select Time" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">24-hour Time Picker</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="timepickr" data-time-hrs="true"</code>
                                            attribute.
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-provider="timepickr" data-time-hrs="true" id="timepicker-24hrs" placeholder="Select Time" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Time Picker w/ Limits</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="timepickr" data-min-time="Min.Time" data-max-time="Max.Time"</code>
                                            attribute.
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-max-time="16:00" data-min-time="13:00" data-provider="timepickr" placeholder="Select Time" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Preloading Time</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="timepickr" data-default-time="Your Default Time"</code>
                                            attribute.
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-default-time="16:45" data-provider="timepickr" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Inline</h5>
                                        <p class="text-default-500">
                                            Set
                                            <code>data-provider="timepickr" data-time-inline="Your Default Time"</code>
                                            attribute.
                                        </p>
                                    </div>
                                    <div>
                                        <input class="form-input" data-provider="timepickr" data-time-inline="11:42" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Date Range Picker</h4>
                            </div>
                            <div class="card-body">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Date Range</h5>
                                        <p class="text-default-500">Select a custom date range from the calendar.</p>
                                    </div>
                                    <div>
                                        <input class="form-input date" data-cancel-class="btn-warning" data-toggle="date-picker" id="singledaterange" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Date Range Picker With Times</h5>
                                        <p class="text-default-500">Includes both start and end time selection.</p>
                                    </div>
                                    <div>
                                        <input class="form-input date" data-locale="{'format': 'DD/MM hh:mm A'}" data-time-picker="true" data-toggle="date-picker" id="daterangetime" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Single Date Picker</h5>
                                        <p class="text-default-500">Select a single date (e.g., birthday).</p>
                                    </div>
                                    <div>
                                        <input class="form-input date" data-single-date-picker="true" data-toggle="date-picker" id="birthdatepicker" type="text" />
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Predefined Date Ranges</h5>
                                        <p class="text-default-500">Choose from common ranges like "Last 7 Days", etc.</p>
                                    </div>
                                    <div class="relative">
                                        <div class="form-input flex! items-center" data-cancel-class="btn-light" data-target-display="#selectedValue" data-toggle="date-picker-range" id="reportrange">
                                            <i class="iconify tabler--calendar me-2"></i>
                                            <span id="selectedValue"></span>
                                            <i class="iconify tabler--chevron-down absolute end-0 top-1/2 me-1 -translate-1/2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Colorpicker</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mb-5">Example</h4>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Classic Demo</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>classic-colorpicker</code>
                                            class to set classic colorpicker.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="classic-colorpicker"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Monolith Demo</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>monolith-colorpicker</code>
                                            class to set monolith colorpicker.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="monolith-colorpicker"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Nano Demo</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>nano-colorpicker</code>
                                            class to set nano colorpicker.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="nano-colorpicker"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Demo</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>colorpicker-demo</code>
                                            class to set demo option colorpicker.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="colorpicker-demo"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Picker with Opacity &amp; Hue</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>colorpicker-opacity-hue</code>
                                            class to set colorpicker with opacity &amp; hue.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="colorpicker-opacity-hue"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Switches</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>colorpicker-switch</code>
                                            class to set switch colorpicker.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="colorpicker-switch"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Picker with Input</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>colorpicker-input</code>
                                            class to set colorpicker with input.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="colorpicker-input"></div>
                                    </div>
                                </div>
                                <hr class="border-default-300 my-7.5 border-dashed" />
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
                                    <div>
                                        <h5 class="mb-2 block text-sm font-semibold">Color Format</h5>
                                        <p class="text-default-500">
                                            Use
                                            <code>colorpicker-format</code>
                                            class to set colorpicker with format option.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="colorpicker-format"></div>
                                    </div>
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
    @vite(["resources/js/pages/form-date-range-picker.js"])
    @vite(["resources/js/pages/form-colorpickr.js"])
@endsection
