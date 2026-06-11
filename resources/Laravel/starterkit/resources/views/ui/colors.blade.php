@extends("shared.base", ["title" => "Colors"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Base UI", "title" => "Colors"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Base UI", "title" => "Colors"])

                <div class="container">

                    {{-- ForWorship Brand Palette --}}
                    <div class="card mb-base">
                        <div class="card-header">
                            <h4 class="card-title">ForWorship Brand Palette</h4>
                            <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                <i class="iconify tabler--chevron-up text-base"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="text-default-400 mb-5">The ForWorship color system. Most interfaces should stay neutral — accent colors step in only when hierarchy, emotion, or status needs support.</p>
                            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4">
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#6b7280"></div>
                                    <p class="text-sm font-semibold">Slate</p>
                                    <p class="text-xs text-default-400">#6b7280</p>
                                    <p class="text-xs text-default-400 mt-1">Primary, links, calm emphasis</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#b65e3c"></div>
                                    <p class="text-sm font-semibold">Terracotta</p>
                                    <p class="text-xs text-default-400">#b65e3c</p>
                                    <p class="text-xs text-default-400 mt-1">Secondary, warmth, creative accents</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#848e6c"></div>
                                    <p class="text-sm font-semibold">Olive</p>
                                    <p class="text-xs text-default-400">#848e6c</p>
                                    <p class="text-xs text-default-400 mt-1">Success, growth, progress</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#BFA052"></div>
                                    <p class="text-sm font-semibold">Gold</p>
                                    <p class="text-xs text-default-400">#BFA052</p>
                                    <p class="text-xs text-default-400 mt-1">Warning, highlights, encouragement</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#7a5c63"></div>
                                    <p class="text-sm font-semibold">Mauve</p>
                                    <p class="text-xs text-default-400">#7a5c63</p>
                                    <p class="text-xs text-default-400 mt-1">Reflective, depth, storytelling</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#a05252"></div>
                                    <p class="text-sm font-semibold">Muted Brick</p>
                                    <p class="text-xs text-default-400">#a05252</p>
                                    <p class="text-xs text-default-400 mt-1">Error, destructive actions only</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-4 mt-4">
                                <div>
                                    <div class="rounded h-20 mb-3 border border-default-200" style="background:#f7f4ee"></div>
                                    <p class="text-sm font-semibold">Warm Canvas</p>
                                    <p class="text-xs text-default-400">#f7f4ee</p>
                                    <p class="text-xs text-default-400 mt-1">Page background</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3 border border-default-200" style="background:#ffffff"></div>
                                    <p class="text-sm font-semibold">Surface</p>
                                    <p class="text-xs text-default-400">#ffffff</p>
                                    <p class="text-xs text-default-400 mt-1">Cards, panels, inputs</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#d6d2c8"></div>
                                    <p class="text-sm font-semibold">Light Gray</p>
                                    <p class="text-xs text-default-400">#d6d2c8</p>
                                    <p class="text-xs text-default-400 mt-1">Dividers, borders, structure</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#1c1c1e"></div>
                                    <p class="text-sm font-semibold">Near Black</p>
                                    <p class="text-xs text-default-400">#1c1c1e</p>
                                    <p class="text-xs text-default-400 mt-1">Primary text, mark color</p>
                                </div>
                                <div>
                                    <div class="rounded h-20 mb-3" style="background:#2a2a2d"></div>
                                    <p class="text-sm font-semibold">Dark Canvas</p>
                                    <p class="text-xs text-default-400">#2a2a2d</p>
                                    <p class="text-xs text-default-400 mt-1">Dark mode card surface</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Semantic Tokens --}}
                    <div class="card mb-base">
                        <div class="card-header">
                            <h4 class="card-title">Semantic Color Tokens</h4>
                            <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                <i class="iconify tabler--chevron-up text-base"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="text-default-400 mb-5">These map ForWorship brand colors to Inspinia's utility token system.</p>
                            <div class="grid grid-cols-2 sm:grid-cols-4 xl:grid-cols-8 gap-4">
                                <div>
                                    <div class="bg-primary rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Primary</p>
                                    <p class="text-xs text-default-400">Slate</p>
                                </div>
                                <div>
                                    <div class="bg-secondary rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Secondary</p>
                                    <p class="text-xs text-default-400">Terracotta</p>
                                </div>
                                <div>
                                    <div class="bg-success rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Success</p>
                                    <p class="text-xs text-default-400">Olive</p>
                                </div>
                                <div>
                                    <div class="bg-warning rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Warning</p>
                                    <p class="text-xs text-default-400">Gold</p>
                                </div>
                                <div>
                                    <div class="bg-danger rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Danger</p>
                                    <p class="text-xs text-default-400">Muted Brick</p>
                                </div>
                                <div>
                                    <div class="bg-info rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Info</p>
                                    <p class="text-xs text-default-400">Slate</p>
                                </div>
                                <div>
                                    <div class="bg-purple rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Purple</p>
                                    <p class="text-xs text-default-400">Mauve</p>
                                </div>
                                <div>
                                    <div class="bg-dark rounded h-16 mb-3"></div>
                                    <p class="text-xs font-semibold">Dark</p>
                                    <p class="text-xs text-default-400">Near Black</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Neutral Scale --}}
                    <div class="card mb-base">
                        <div class="card-header">
                            <h4 class="card-title">Neutral Scale</h4>
                            <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                <i class="iconify tabler--chevron-up text-base"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="text-default-400 mb-5">The neutral scale is derived from Warm Canvas. Use <code>bg-default-{n}</code>, <code>text-default-{n}</code>, and <code>border-default-{n}</code>.</p>
                            <div class="grid grid-cols-2 sm:grid-cols-4 xl:grid-cols-6 gap-4">
                                @foreach([['50','#faf9f5'],['100','#f7f4ee'],['200','#eee9df'],['300','#e4e0d8'],['400','#c8c4bb'],['500','#a8a49b'],['600','#888480'],['700','#6b7280'],['800','#3d3d42'],['900','#1c1c1e'],['950','#0e0e0f']] as [$step, $hex])
                                <div>
                                    <div class="rounded h-12 mb-2 border border-default-200/50" style="background:{{ $hex }}"></div>
                                    <p class="text-xs font-semibold">default-{{ $step }}</p>
                                    <p class="text-xs text-default-400">{{ $hex }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Soft tints --}}
                    <div class="card mb-base">
                        <div class="card-header">
                            <h4 class="card-title">Soft Tints</h4>
                            <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                <i class="iconify tabler--chevron-up text-base"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="text-default-400 mb-5">Use Tailwind opacity modifiers (<code>bg-primary/10</code>, <code>bg-secondary/15</code>) for soft tinted backgrounds in alerts, badges, and status chips.</p>
                            <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                                <div class="rounded p-4 bg-primary/10 border border-primary/20">
                                    <p class="text-sm font-semibold text-primary">Primary / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use for calm callouts and information highlights</p>
                                </div>
                                <div class="rounded p-4 bg-secondary/10 border border-secondary/20">
                                    <p class="text-sm font-semibold text-secondary">Secondary / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use for creative warmth moments</p>
                                </div>
                                <div class="rounded p-4 bg-success/10 border border-success/20">
                                    <p class="text-sm font-semibold text-success">Success / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use for approvals and completions</p>
                                </div>
                                <div class="rounded p-4 bg-warning/10 border border-warning/20">
                                    <p class="text-sm font-semibold text-warning">Warning / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use for attention without alarm</p>
                                </div>
                                <div class="rounded p-4 bg-danger/10 border border-danger/20">
                                    <p class="text-sm font-semibold text-danger">Danger / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use only for true error or destructive states</p>
                                </div>
                                <div class="rounded p-4 bg-purple/10 border border-purple/20">
                                    <p class="text-sm font-semibold text-purple">Purple / 10</p>
                                    <p class="text-xs text-default-500 mt-1">Use for reflective or editorial moments</p>
                                </div>
                                <div class="rounded p-4 bg-dark/5 border border-dark/10">
                                    <p class="text-sm font-semibold text-dark">Dark / 5</p>
                                    <p class="text-xs text-default-500 mt-1">Use for very subtle panel backgrounds</p>
                                </div>
                                <div class="rounded p-4 bg-light border border-default-300">
                                    <p class="text-sm font-semibold text-dark">Light</p>
                                    <p class="text-xs text-default-500 mt-1">Use for hover states and quiet separators</p>
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
