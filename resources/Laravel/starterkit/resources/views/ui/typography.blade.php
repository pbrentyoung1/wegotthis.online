@extends("shared.base", ["title" => "Typography"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Base UI", "title" => "Typography"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Base UI", "title" => "Typography"])

                <div class="container">
                    <div class="grid grid-cols-1 xl:grid-cols-6 gap-base">
                        <div class="xl:col-span-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Display Headings</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="space-y-3 grid grid-cols-2">
                                        <h1 class="text-xs">h1 — text-xs</h1>
                                        <h1 class="text-sm">h1 — text-sm</h1>
                                        <h1 class="text-base">h1 — text-base</h1>
                                        <h1 class="text-lg">h1 — text-lg</h1>
                                        <h1 class="text-xl">h1 — text-xl</h1>
                                        <h1 class="text-2xl">h1 — text-2xl</h1>
                                        <h1 class="text-3xl">h1 — text-3xl</h1>
                                        <h1 class="text-4xl">h1 — text-4xl</h1>
                                        <h1 class="text-5xl">h1 — text-5xl</h1>
                                        <h2 class="text-3xl">h2 — text-3xl (Fraunces)</h2>
                                        <h3 class="text-2xl">h3 — text-2xl (Fraunces)</h3>
                                        <h4 class="text-xl">h4 — text-xl (IBM Plex Sans)</h4>
                                        <h5 class="text-lg">h5 — text-lg (IBM Plex Sans)</h5>
                                        <h6 class="text-base">h6 — text-base (IBM Plex Sans)</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ForWorship Type System</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body space-y-6">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-widest text-default-400 mb-3">Fraunces — Editorial &amp; Warmth</p>
                                        <h1 class="text-5xl mb-2">Let's get your team organized.</h1>
                                        <h2 class="text-3xl mb-2">Everything you need for Sunday is in one place.</h2>
                                        <h3 class="text-2xl italic text-secondary">We'll help you figure it out.</h3>
                                    </div>
                                    <div class="border-t border-default-200 pt-6">
                                        <p class="text-xs font-semibold uppercase tracking-widest text-default-400 mb-3">IBM Plex Sans — Operational UI</p>
                                        <p class="text-lg mb-2">We'll walk through the essentials together and help shape your workspace around the way your church actually works.</p>
                                        <p class="text-sm text-default-500">Supporting copy, metadata, labels, and all dense operational text uses IBM Plex Sans for clarity and readability.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Inline Text Elements</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="space-y-4">
                                        <p class="text-default-400">Styling for common inline HTML5 elements.</p>
                                        <p class="text-lg font-light">Your title goes here</p>
                                        <p class="font-light">
                                            You can use the mark tag to
                                            <mark class="bg-warning/15 p-1">highlight</mark>
                                            text.
                                        </p>
                                        <p class="font-light">
                                            <del>This line of text is meant to be treated as deleted text.</del>
                                        </p>
                                        <p class="font-light">
                                            <s>This line of text is meant to be treated as no longer accurate.</s>
                                        </p>
                                        <p class="font-light">
                                            <ins>This line of text is meant to be treated as an addition to the document.</ins>
                                        </p>
                                        <p class="font-light">
                                            <u>This line of text will render as underlined</u>
                                        </p>
                                        <p class="font-light">
                                            <small>This line of text is meant to be treated as fine print.</small>
                                        </p>
                                        <p class="font-light">
                                            <strong>This line rendered as bold text.</strong>
                                        </p>
                                        <p class="font-light">
                                            <em>This line rendered as italicized text.</em>
                                        </p>
                                        <p class="mb-0 font-light">
                                            Nulla
                                            <abbr title="attribute">attr</abbr>
                                            vitae elit libero, a pharetra augue.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Unordered</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="text-default-400 mb-4">A list of items in which the order does not explicitly matter.</p>
                                    <ul class="list-inside list-disc space-y-1">
                                        <li>Fully responsive design</li>
                                        <li>Built with TailwindCSS 4 framework</li>
                                        <li>Clean and modern UI components</li>
                                        <li>Cross-browser compatibility</li>
                                        <li>
                                            Multiple form elements and validations
                                            <ul class="ms-10 list-inside list-disc">
                                                <li>Rich input controls</li>
                                                <li>Step-based form wizards</li>
                                                <li>Real-time validation</li>
                                                <li>Customizable styles</li>
                                            </ul>
                                        </li>
                                        <li>Advanced chart and graph libraries</li>
                                        <li>Integrated data tables and sorting</li>
                                        <li>Developer-friendly code structure</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ordered</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="text-default-400 mb-4">A list of items in which the order does explicitly matter.</p>
                                    <ol class="list-inside list-decimal space-y-1">
                                        <li>Install all dependencies</li>
                                        <li>Configure project environment settings</li>
                                        <li>Set up folder structure and routing</li>
                                        <li>Integrate UI components and layout</li>
                                        <li>
                                            Implement core modules
                                            <ol class="ms-10 list-inside list-decimal space-y-1">
                                                <li>Authentication &amp; Authorization</li>
                                                <li>Dashboard widgets and metrics</li>
                                                <li>User profile management</li>
                                                <li>Notification &amp; messaging systems</li>
                                            </ol>
                                        </li>
                                        <li>Connect backend APIs and test data flow</li>
                                        <li>Optimize performance and responsive design</li>
                                        <li>Final testing and deployment</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Blockquotes</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <blockquote>
                                        <p class="text-lg">"Good design is obvious. Great design is transparent."</p>
                                    </blockquote>
                                    <figcaption class="mt-1 mb-5 text-default-400">
                                        — Joe Sparano in
                                        <cite class="italic">Design Principles</cite>
                                    </figcaption>
                                    <p class="text-default-400 mb-4">Use text utilities as needed to change the alignment of your blockquote.</p>
                                    <blockquote class="text-center">
                                        <p class="text-lg">"First, solve the problem. Then, write the code."</p>
                                    </blockquote>
                                    <figcaption class="mt-1 mb-5 text-default-400 text-center">
                                        — John Johnson in
                                        <cite class="italic">Developer Wisdom</cite>
                                    </figcaption>
                                    <blockquote class="text-end">
                                        <p class="text-lg">"Simplicity is the soul of efficiency."</p>
                                    </blockquote>
                                    <figcaption class="mt-1 mb-5 text-default-400 text-end">
                                        — Austin Freeman in
                                        <cite class="italic">Efficiency in Design</cite>
                                    </figcaption>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Alignment</h4>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="text-default-400 mb-4">Use text utilities as needed to change the alignment of your blockquote.</p>
                                    <figure class="mb-5 text-center">
                                        <blockquote>
                                            <p class="mb-1 text-lg">"Design is not just what it looks like and feels like. Design is how it works."</p>
                                        </blockquote>
                                        <figcaption class="text-default-400">
                                            — Steve Jobs in
                                            <cite title="Steve Jobs Biography">Steve Jobs Biography</cite>
                                        </figcaption>
                                    </figure>
                                    <figure class="text-end">
                                        <blockquote>
                                            <p class="mb-1 text-lg">"Simplicity is the ultimate sophistication."</p>
                                        </blockquote>
                                        <figcaption class="text-default-400">
                                            Leonardo da Vinci in
                                            <cite title="Design Philosophy">Design Philosophy</cite>
                                        </figcaption>
                                    </figure>
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
