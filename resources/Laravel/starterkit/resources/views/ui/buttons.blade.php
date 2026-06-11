@extends("shared.base", ["title" => "Buttons"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Base UI", "title" => "Buttons"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Base UI", "title" => "Buttons"])

                <div class="container">
                    <div class="grid grid-cols-1 gap-base">

                        {{-- Solid Buttons --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Solid Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use the <code>.btn</code> class on <code>&lt;button&gt;</code> elements. Pair with <code>bg-*</code> and <code>text-white</code> for filled variants.</p>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn border-default-300" type="button">Default</button>
                                    <button class="btn bg-primary hover:bg-primary-hover text-white" type="button">Primary</button>
                                    <button class="btn bg-secondary hover:bg-secondary-hover text-white" type="button">Secondary</button>
                                    <button class="btn bg-success hover:bg-success-hover text-white" type="button">Success</button>
                                    <button class="btn bg-warning hover:bg-warning-hover text-white" type="button">Warning</button>
                                    <button class="btn bg-danger hover:bg-danger-hover text-white" type="button">Danger</button>
                                    <button class="btn bg-dark hover:bg-dark-hover text-white" type="button">Dark</button>
                                    <button class="btn bg-light text-dark hover:bg-light-hover" type="button">Light</button>
                                </div>
                            </div>
                        </div>

                        {{-- Pill / Rounded --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pill Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Add <code>.rounded-full</code> to give buttons smooth, pill-shaped corners.</p>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn rounded-full border-default-300" type="button">Default</button>
                                    <button class="btn bg-primary hover:bg-primary-hover rounded-full text-white" type="button">Primary</button>
                                    <button class="btn bg-secondary hover:bg-secondary-hover rounded-full text-white" type="button">Secondary</button>
                                    <button class="btn bg-success hover:bg-success-hover rounded-full text-white" type="button">Success</button>
                                    <button class="btn bg-warning hover:bg-warning-hover rounded-full text-white" type="button">Warning</button>
                                    <button class="btn bg-danger hover:bg-danger-hover rounded-full text-white" type="button">Danger</button>
                                    <button class="btn bg-dark hover:bg-dark-hover rounded-full text-white" type="button">Dark</button>
                                </div>
                            </div>
                        </div>

                        {{-- Outline Buttons --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Outline Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use <code>.border-*</code> and <code>.text-*</code> to create bordered outline buttons that fill on hover.</p>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn border-primary text-primary hover:bg-primary hover:text-white" type="button">Primary</button>
                                    <button class="btn border-secondary text-secondary hover:bg-secondary hover:text-white" type="button">Secondary</button>
                                    <button class="btn border-success text-success hover:bg-success hover:text-white" type="button">Success</button>
                                    <button class="btn border-warning text-warning hover:bg-warning hover:text-white" type="button">Warning</button>
                                    <button class="btn border-danger text-danger hover:bg-danger hover:text-white" type="button">Danger</button>
                                    <button class="btn border-dark text-dark hover:bg-dark hover:text-white" type="button">Dark</button>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-2.5">
                                    <button class="btn border-primary text-primary hover:bg-primary rounded-full hover:text-white" type="button">Primary</button>
                                    <button class="btn border-secondary text-secondary hover:bg-secondary rounded-full hover:text-white" type="button">Secondary</button>
                                    <button class="btn border-success text-success hover:bg-success rounded-full hover:text-white" type="button">Success</button>
                                    <button class="btn border-warning text-warning hover:bg-warning rounded-full hover:text-white" type="button">Warning</button>
                                    <button class="btn border-danger text-danger hover:bg-danger rounded-full hover:text-white" type="button">Danger</button>
                                    <button class="btn border-dark text-dark hover:bg-dark rounded-full hover:text-white" type="button">Dark</button>
                                </div>
                            </div>
                        </div>

                        {{-- Soft Buttons --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Soft Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use <code>.bg-*/15</code> for low-contrast tinted buttons that fill to solid on hover. Ideal for secondary actions and chips.</p>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn text-primary bg-primary/15 hover:bg-primary hover:text-white" type="button">Primary</button>
                                    <button class="btn text-secondary bg-secondary/15 hover:bg-secondary hover:text-white" type="button">Secondary</button>
                                    <button class="btn text-success bg-success/15 hover:bg-success hover:text-white" type="button">Success</button>
                                    <button class="btn text-warning bg-warning/15 hover:bg-warning hover:text-white" type="button">Warning</button>
                                    <button class="btn text-danger bg-danger/15 hover:bg-danger hover:text-white" type="button">Danger</button>
                                    <button class="btn text-dark bg-dark/15 hover:bg-dark hover:text-white" type="button">Dark</button>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-2.5">
                                    <button class="btn text-primary bg-primary/15 hover:bg-primary rounded-full hover:text-white" type="button">Primary</button>
                                    <button class="btn text-secondary bg-secondary/15 hover:bg-secondary rounded-full hover:text-white" type="button">Secondary</button>
                                    <button class="btn text-success bg-success/15 hover:bg-success rounded-full hover:text-white" type="button">Success</button>
                                    <button class="btn text-warning bg-warning/15 hover:bg-warning rounded-full hover:text-white" type="button">Warning</button>
                                    <button class="btn text-danger bg-danger/15 hover:bg-danger rounded-full hover:text-white" type="button">Danger</button>
                                    <button class="btn text-dark bg-dark/15 hover:bg-dark rounded-full hover:text-white" type="button">Dark</button>
                                </div>
                            </div>
                        </div>

                        {{-- Ghost Buttons --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ghost Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Ghost buttons have no background or border until hover. Use for low-emphasis actions in toolbars or alongside a primary button.</p>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn text-primary hover:bg-primary hover:text-white" type="button">Primary</button>
                                    <button class="btn text-secondary hover:bg-secondary hover:text-white" type="button">Secondary</button>
                                    <button class="btn text-success hover:bg-success hover:text-white" type="button">Success</button>
                                    <button class="btn text-warning hover:bg-warning hover:text-white" type="button">Warning</button>
                                    <button class="btn text-danger hover:bg-danger hover:text-white" type="button">Danger</button>
                                    <button class="btn text-dark hover:bg-dark hover:text-white" type="button">Dark</button>
                                </div>
                            </div>
                        </div>

                        {{-- Sizes --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Button Sizes</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use <code>.btn-lg</code> or <code>.btn-sm</code> for larger or smaller button sizes. Add <code>.w-full</code> for full-width block buttons.</p>
                                <div class="flex flex-wrap items-center gap-2.5 mb-4">
                                    <button class="btn btn-lg bg-primary hover:bg-primary-hover text-white" type="button">Large</button>
                                    <button class="btn bg-primary hover:bg-primary-hover text-white" type="button">Default</button>
                                    <button class="btn btn-sm bg-primary hover:bg-primary-hover text-white" type="button">Small</button>
                                </div>
                                <div class="space-y-2 max-w-sm">
                                    <button class="btn bg-primary hover:bg-primary-hover w-full text-white" type="button">Full Width Button</button>
                                    <button class="btn btn-lg bg-secondary hover:bg-secondary-hover w-full text-white" type="button">Full Width Large</button>
                                </div>
                            </div>
                        </div>

                        {{-- Icon Buttons --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Icon Buttons</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use <code>.btn-icon</code> for square icon-only buttons, or pair an icon with a text label for clarity in action areas.</p>
                                <div class="flex flex-wrap gap-2.5 mb-4">
                                    <button class="btn btn-icon bg-primary hover:bg-primary-hover text-white" type="button">
                                        <i class="iconify tabler--plus text-lg"></i>
                                    </button>
                                    <button class="btn btn-icon bg-secondary hover:bg-secondary-hover text-white" type="button">
                                        <i class="iconify tabler--pencil text-lg"></i>
                                    </button>
                                    <button class="btn btn-icon bg-success/15 text-success hover:bg-success hover:text-white" type="button">
                                        <i class="iconify tabler--check text-lg"></i>
                                    </button>
                                    <button class="btn btn-icon bg-danger/15 text-danger hover:bg-danger hover:text-white" type="button">
                                        <i class="iconify tabler--trash text-lg"></i>
                                    </button>
                                    <button class="btn btn-icon border-default-300 text-default-600 hover:text-primary" type="button">
                                        <i class="iconify tabler--dots-vertical text-lg"></i>
                                    </button>
                                    <button class="btn btn-icon bg-dark hover:bg-dark-hover rounded-full text-white" type="button">
                                        <i class="iconify tabler--send text-lg"></i>
                                    </button>
                                </div>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn bg-primary hover:bg-primary-hover text-white" type="button">
                                        <i class="iconify tabler--plus text-base"></i>
                                        New Request
                                    </button>
                                    <button class="btn bg-secondary/15 text-secondary hover:bg-secondary hover:text-white" type="button">
                                        <i class="iconify tabler--upload text-base"></i>
                                        Upload
                                    </button>
                                    <button class="btn border-danger text-danger hover:bg-danger hover:text-white" type="button">
                                        <i class="iconify tabler--trash text-base"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- States --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Button States</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Add the <code>disabled</code> attribute to prevent interaction and communicate an inactive state. Loading state uses an icon spinner alongside label text.</p>
                                <div class="flex flex-wrap gap-2.5 mb-4">
                                    <button class="btn bg-primary text-white opacity-60" disabled type="button">Disabled Primary</button>
                                    <button class="btn bg-secondary text-white opacity-60" disabled type="button">Disabled Secondary</button>
                                    <button class="btn border-default-300 opacity-60" disabled type="button">Disabled Default</button>
                                </div>
                                <div class="flex flex-wrap gap-2.5">
                                    <button class="btn bg-primary hover:bg-primary-hover text-white" type="button">
                                        <i class="iconify tabler--loader-2 animate-spin text-base"></i>
                                        Saving…
                                    </button>
                                    <button class="btn bg-secondary/15 text-secondary" type="button">
                                        <i class="iconify tabler--loader-2 animate-spin text-base"></i>
                                        Processing
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Button Groups --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Button Groups</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-400 mb-4">Use <code>inline-flex</code> to group buttons into a single connected control. Round only the outer edges using <code>rounded-e-none</code>, <code>rounded-none</code>, and <code>rounded-s-none</code>.</p>
                                <div class="space-y-3">
                                    <div class="inline-flex">
                                        <button class="btn bg-light hover:text-primary rounded-e-none" type="button">All</button>
                                        <button class="btn bg-primary text-white rounded-none" type="button">Pending</button>
                                        <button class="btn bg-light hover:text-primary rounded-none" type="button">In Review</button>
                                        <button class="btn bg-light hover:text-primary rounded-s-none" type="button">Approved</button>
                                    </div>
                                    <div class="block">
                                        <div class="inline-flex">
                                            <button class="btn bg-light hover:text-primary rounded-e-none" type="button">
                                                <i class="iconify tabler--list text-base"></i>
                                            </button>
                                            <button class="btn bg-light hover:text-primary rounded-s-none" type="button">
                                                <i class="iconify tabler--layout-grid text-base"></i>
                                            </button>
                                        </div>
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
@endsection
