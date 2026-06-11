@extends("shared.base", ["title" => "Cards"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Base UI", "title" => "Cards"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Base UI", "title" => "Cards"])

                <div class="container">

                    {{-- Basic Cards --}}
                    <h4 class="mb-4 text-base font-semibold">Basic Cards</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-base mb-base">
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-4 text-default-500">A minimal card with body only — no header or footer. Good for simple callouts.</p>
                                <a class="btn btn-sm bg-primary hover:bg-primary-hover text-white" href="#">Learn more</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-2.5">Card with Title</h5>
                                <p class="mb-4 text-default-500">Use <code>.card-title</code> inside the body for a simpler layout without a formal header.</p>
                                <a class="btn btn-sm bg-primary hover:bg-primary-hover text-white" href="#">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Card with Header</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-default-500">Use <code>.card-header</code> for a formal top section. Pairs with <code>.card-footer</code> when timestamps or secondary actions are needed.</p>
                            </div>
                            <div class="card-footer text-default-400 text-sm">Updated 2 hours ago</div>
                        </div>
                    </div>

                    {{-- Cards with Action Tools --}}
                    <h4 class="mb-4 text-base font-semibold">Cards with Action Tools</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-base mb-base">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Collapsible Card</h4>
                                <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                    <i class="iconify tabler--chevron-up text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-default-500">The chevron button in the header collapses and expands this card body. Uses Inspinia's <code>data-action="card-toggle"</code>.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Full Controls</h4>
                                <div class="flex gap-1">
                                    <button class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                    <button class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-refresh">
                                        <i class="iconify tabler--refresh text-base"></i>
                                    </button>
                                    <button class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-close">
                                        <i class="iconify tabler--x text-base"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-default-500">Toggle collapse, refresh content, or dismiss this card entirely using the three action buttons.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">With Dropdown Menu</h4>
                                <div class="hs-dropdown relative inline-flex">
                                    <button aria-expanded="false" aria-haspopup="menu" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" type="button">
                                        <i class="iconify tabler--dots-vertical text-base"></i>
                                    </button>
                                    <div class="hs-dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Duplicate</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-default-500">Use a Preline dropdown instead of icon buttons when you need more than two contextual actions.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Colored Cards --}}
                    <h4 class="mb-4 text-base font-semibold">Colored Cards</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-base mb-base">
                        <div class="card bg-primary!">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-white">Primary</h5>
                                <p class="mb-4 text-white/80">Slate — for calm emphasis and primary actions.</p>
                                <a class="btn btn-sm bg-white hover:text-primary text-default-800" href="#">Action</a>
                            </div>
                        </div>
                        <div class="card bg-secondary!">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-white">Secondary</h5>
                                <p class="mb-4 text-white/80">Terracotta — warmth and creative accents.</p>
                                <a class="btn btn-sm bg-white hover:text-secondary text-default-800" href="#">Action</a>
                            </div>
                        </div>
                        <div class="card bg-success!">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-white">Success</h5>
                                <p class="mb-4 text-white/80">Olive — growth, progress, and completion.</p>
                                <a class="btn btn-sm bg-white hover:text-success text-default-800" href="#">Action</a>
                            </div>
                        </div>
                        <div class="card bg-warning!">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-white">Warning</h5>
                                <p class="mb-4 text-white/80">Gold — highlights and encouragement.</p>
                                <a class="btn btn-sm bg-white hover:text-warning text-default-800" href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    {{-- Bordered Cards --}}
                    <h4 class="mb-4 text-base font-semibold">Bordered Cards</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-base mb-base">
                        <div class="card border border-primary">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-primary">Primary Border</h5>
                                <p class="text-default-500">Use <code>border border-primary</code> for a card that signals primary attention without a filled background.</p>
                            </div>
                        </div>
                        <div class="card border border-secondary">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-secondary">Secondary Border</h5>
                                <p class="text-default-500">Terracotta border for creative warmth moments that don't need a full color card.</p>
                            </div>
                        </div>
                        <div class="card border border-danger">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-danger">Danger Border</h5>
                                <p class="text-default-500">Use a danger border to draw attention to a destructive action, error state, or blocking issue.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Tinted / Soft Cards --}}
                    <h4 class="mb-4 text-base font-semibold">Tinted Cards</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-base mb-base">
                        <div class="card bg-primary/5 border-primary/20 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-primary">
                                        <i class="iconify tabler--info-circle text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-primary mb-1">Good to know</p>
                                        <p class="text-sm text-default-500">Use soft tinted cards for informational callouts. Keep the message short and actionable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-success/5 border-success/20 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-success">
                                        <i class="iconify tabler--circle-check text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-success mb-1">Request approved</p>
                                        <p class="text-sm text-default-500">VBS 2026 Social Media Kit was approved by the Communications team and is now active.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-warning/5 border-warning/20 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-warning">
                                        <i class="iconify tabler--alert-triangle text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-warning mb-1">Due date approaching</p>
                                        <p class="text-sm text-default-500">This deliverable is due in 3 days. Make sure to submit for review before Sunday.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-danger/5 border-danger/20 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-danger">
                                        <i class="iconify tabler--alert-octagon text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-danger mb-1">Action required</p>
                                        <p class="text-sm text-default-500">Changes were requested on this deliverable. Review the feedback and resubmit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-purple/5 border-purple/20 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-purple">
                                        <i class="iconify tabler--sparkles text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-purple mb-1">Insight</p>
                                        <p class="text-sm text-default-500">Mauve is for reflective, editorial, and story-driven moments — use it sparingly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark/5 border-dark/10 border">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <span class="flex-shrink-0 mt-0.5 text-dark">
                                        <i class="iconify tabler--lock text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="font-semibold text-dark mb-1">Admin only</p>
                                        <p class="text-sm text-default-500">Dark tint for very subtle system-level or restricted-access callouts.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Cards --}}
                    <h4 class="mb-4 text-base font-semibold">Content Cards</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-base mb-base">
                        {{-- Request summary card --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="flex items-center gap-2">
                                    <span class="badge bg-warning/15 text-warning text-xs">Pending</span>
                                    <h4 class="card-title">VBS 2026 — Social Media</h4>
                                </div>
                                <button class="btn btn-icon size-7 bg-light text-default-500 hover:text-primary" type="button">
                                    <i class="iconify tabler--dots-vertical text-base"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="text-sm text-default-500 mb-4">Social graphics for VBS promotion across Instagram, Facebook, and the church app. Needed before May 1.</p>
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    <span class="badge bg-light text-default-500 text-xs">Children</span>
                                    <span class="badge bg-primary/10 text-primary text-xs">Graphics</span>
                                    <span class="badge bg-primary/10 text-primary text-xs">Social</span>
                                </div>
                                <div class="flex items-center justify-between text-xs text-default-400">
                                    <span><i class="iconify tabler--calendar text-sm mr-1"></i> Due May 1</span>
                                    <span>Requested by Sarah N.</span>
                                </div>
                            </div>
                        </div>

                        {{-- Person card --}}
                        <div class="card">
                            <div class="card-body text-center py-8">
                                <div class="w-16 h-16 rounded-full bg-primary/15 text-primary flex items-center justify-center mx-auto mb-4 text-2xl font-display font-semibold">
                                    SN
                                </div>
                                <h5 class="card-title mb-0.5">Sarah Nguyen</h5>
                                <p class="text-sm text-default-400 mb-3">Communications Director</p>
                                <div class="flex justify-center gap-1.5 mb-4">
                                    <span class="badge bg-primary/10 text-primary text-xs">Admin</span>
                                    <span class="badge bg-success/10 text-success text-xs">Verified</span>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <button class="btn btn-sm bg-primary hover:bg-primary-hover text-white" type="button">
                                        <i class="iconify tabler--message text-sm"></i>
                                        Message
                                    </button>
                                    <button class="btn btn-sm border-default-300 text-default-600 hover:text-primary" type="button">
                                        <i class="iconify tabler--user text-sm"></i>
                                        Profile
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Stat card --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <p class="text-xs text-default-400 uppercase tracking-wider mb-1">Active Requests</p>
                                        <h3 class="text-3xl font-display font-semibold text-dark">12</h3>
                                    </div>
                                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-primary/15 text-primary">
                                        <i class="iconify tabler--files text-xl"></i>
                                    </span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <span class="text-success font-medium">
                                        <i class="iconify tabler--arrow-up text-sm"></i>
                                        3
                                    </span>
                                    <span class="text-default-400">new since last week</span>
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
