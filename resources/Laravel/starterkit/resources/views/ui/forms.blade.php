@extends("shared.base", ["title" => "Forms"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Base UI", "title" => "Forms"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Base UI", "title" => "Forms"])

                <div class="container">
                    <div class="grid grid-cols-1 gap-base">

                        {{-- Text Inputs --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Text Inputs</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-5">Use <code>.form-label</code> and <code>.form-input</code> for standard text fields. Helper text sits below in <code>text-xs text-default-400</code>.</p>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="demo-text">Label</label>
                                        <input class="form-input" id="demo-text" placeholder="Placeholder text" type="text" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-helper">With helper text</label>
                                        <input class="form-input" id="demo-helper" placeholder="your@email.com" type="email" />
                                        <p class="mt-1 text-xs text-default-400">Changing your email requires re-verification.</p>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-required">Required field <span class="text-danger">*</span></label>
                                        <input class="form-input" id="demo-required" placeholder="Display name" required type="text" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-readonly">Read-only</label>
                                        <input class="form-input bg-light/50 text-default-500" id="demo-readonly" readonly type="text" value="Grace Community Church" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-disabled">Disabled</label>
                                        <input class="form-input" disabled id="demo-disabled" type="text" value="Not editable" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-password">Password</label>
                                        <input class="form-input" id="demo-password" placeholder="••••••••" type="password" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Rich Text / Quill --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rich Text Editor</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-2">Use Quill with the Snow theme for rich text fields.</p>
                                <p class="text-default-400 mb-5">Persist Quill Delta data, not exported HTML. Any future HTML rendering must be sanitized server-side before display.</p>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label">Bio</label>
                                        <div id="bio-editor" style="height: 180px"></div>
                                    </div>
                                    <div>
                                        <label class="form-label">Project notes</label>
                                        <div id="notes-editor" style="height: 180px"></div>
                                        <p class="mt-1 text-xs text-default-400">Visible to communications team only.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Select --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-5">Use <code>.form-select</code> for dropdown selects.</p>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="demo-dept">Department</label>
                                        <select class="form-select" id="demo-dept">
                                            <option value="">Select a department…</option>
                                            <option>Communications</option>
                                            <option>Worship</option>
                                            <option>Youth</option>
                                            <option>Children</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-priority">Priority</label>
                                        <select class="form-select" id="demo-priority">
                                            <option value="">Select priority…</option>
                                            <option>Low</option>
                                            <option>Normal</option>
                                            <option>High</option>
                                            <option>Urgent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Checkboxes and Radios --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Checkboxes and Radios</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-5">Use <code>.form-check</code> and <code>.form-check-input</code> for checkboxes and radio buttons with consistent vertical alignment.</p>
                                <div class="grid grid-cols-1 gap-x-base gap-y-6 lg:grid-cols-2">
                                    <div>
                                        <p class="form-label mb-3">Checkboxes</p>
                                        <div class="space-y-2">
                                            <div class="flex items-center gap-2">
                                                <input class="form-checkbox" id="chk-social" type="checkbox" checked />
                                                <label class="text-sm cursor-pointer" for="chk-social">Social media graphics</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-checkbox" id="chk-bulletin" type="checkbox" />
                                                <label class="text-sm cursor-pointer" for="chk-bulletin">Bulletin insert</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-checkbox" id="chk-email" type="checkbox" />
                                                <label class="text-sm cursor-pointer" for="chk-email">Email newsletter</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-checkbox" id="chk-screen" type="checkbox" disabled />
                                                <label class="text-sm text-default-400" for="chk-screen">Screens (not available)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="form-label mb-3">Radio Buttons</p>
                                        <div class="space-y-2">
                                            <div class="flex items-center gap-2">
                                                <input class="form-radio" id="radio-low" name="priority-demo" type="radio" />
                                                <label class="text-sm cursor-pointer" for="radio-low">Low — no deadline pressure</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-radio" id="radio-normal" name="priority-demo" type="radio" checked />
                                                <label class="text-sm cursor-pointer" for="radio-normal">Normal — standard timeline</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-radio" id="radio-high" name="priority-demo" type="radio" />
                                                <label class="text-sm cursor-pointer" for="radio-high">High — approaching deadline</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input class="form-radio" id="radio-urgent" name="priority-demo" type="radio" />
                                                <label class="text-sm cursor-pointer" for="radio-urgent">Urgent — immediate attention</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Input with Leading/Trailing Adornment --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Adornments</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-5">Wrap an input in a relative container and use absolute-positioned icons or text to add leading or trailing adornments without changing the input height.</p>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="demo-search">Search</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-default-400">
                                                <i class="iconify tabler--search text-base"></i>
                                            </span>
                                            <input class="form-input pl-9" id="demo-search" placeholder="Search people or projects…" type="search" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-date">Due Date</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-default-400 pointer-events-none">
                                                <i class="iconify tabler--calendar text-base"></i>
                                            </span>
                                            <input class="form-input pl-9" data-provider="flatpickr" data-date-format="d M, Y" id="demo-date" placeholder="Select date" type="text" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-url">Project URL</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center rounded-s border border-e-0 border-default-300 bg-light px-3 text-sm text-default-500">
                                                https://
                                            </span>
                                            <input class="form-input rounded-s-none" id="demo-url" placeholder="app.forworship.org/projects/…" type="text" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-budget">Budget</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center rounded-s border border-e-0 border-default-300 bg-light px-3 text-sm text-default-500">$</span>
                                            <input class="form-input rounded-s-none rounded-e-none" id="demo-budget" placeholder="0.00" type="number" />
                                            <span class="inline-flex items-center rounded-e border border-s-0 border-default-300 bg-light px-3 text-sm text-default-500">USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Validation States --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Validation States</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-5">Use <code>border-success</code> or <code>border-danger</code> on the input and matching helper text to communicate validation states.</p>
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="demo-valid">Display name</label>
                                        <input class="form-input border-success" id="demo-valid" type="text" value="Sarah Nguyen" />
                                        <p class="mt-1 text-xs text-success">Looks good.</p>
                                    </div>
                                    <div>
                                        <label class="form-label" for="demo-invalid">Email address</label>
                                        <input class="form-input border-danger" id="demo-invalid" type="email" value="not-an-email" />
                                        <p class="mt-1 text-xs text-danger">Please enter a valid email address.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Composed Form Example --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Request Intake Form — Example</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-6">A composed example showing how form elements combine in a real intake screen.</p>

                                <h5 class="bg-light/15 border-default-300 mb-5 flex items-center justify-center gap-1.5 rounded border border-dashed p-1.25 text-sm uppercase">
                                    <i class="iconify tabler--file-description text-base"></i>
                                    Request details
                                </h5>

                                <div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2 mb-6">
                                    <div class="lg:col-span-2">
                                        <label class="form-label" for="req-title">Request title <span class="text-danger">*</span></label>
                                        <input class="form-input" id="req-title" placeholder="e.g. VBS 2026 — Social media kit" required type="text" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="req-dept">Department <span class="text-danger">*</span></label>
                                        <select class="form-select" id="req-dept" required>
                                            <option value="">Select your department…</option>
                                            <option>Communications</option>
                                            <option>Worship</option>
                                            <option>Youth</option>
                                            <option>Children</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="req-due">Requested by <span class="text-danger">*</span></label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-default-400 pointer-events-none">
                                                <i class="iconify tabler--calendar text-base"></i>
                                            </span>
                                            <input class="form-input pl-9" data-provider="flatpickr" data-date-format="d M, Y" id="req-due" placeholder="Select date" required type="text" />
                                        </div>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <label class="form-label">What do you need? <span class="text-danger">*</span></label>
                                        <div id="description-editor" style="height: 200px"></div>
                                    </div>
                                </div>

                                <h5 class="bg-light/15 border-default-300 mb-5 flex items-center justify-center gap-1.5 rounded border border-dashed p-1.25 text-sm uppercase">
                                    <i class="iconify tabler--checklist text-base"></i>
                                    Deliverables needed
                                </h5>

                                <div class="grid grid-cols-2 gap-2 mb-6 sm:grid-cols-3 lg:grid-cols-4">
                                    @foreach(['Social media graphics', 'Bulletin insert', 'Email newsletter', 'Screens / slides', 'Print poster', 'Video / reel', 'Website update', 'Other'] as $item)
                                    <div class="flex items-center gap-2">
                                        <input class="form-checkbox" id="del-{{ Str::slug($item) }}" type="checkbox" />
                                        <label class="text-sm cursor-pointer" for="del-{{ Str::slug($item) }}">{{ $item }}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button class="btn border-default-300" type="button">Cancel</button>
                                    <button class="btn bg-primary hover:bg-primary-hover text-white" type="button">Submit Request</button>
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
    @vite(["resources/js/pages/form-quilljs.js"])
@endsection
