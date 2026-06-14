@extends("shared.base", ["title" => "My Schedule"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Work", "title" => "My Schedule"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Work", "title" => "My Schedule"])
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header flex flex-wrap items-center justify-between gap-3">
                            <div>
                                <h4 class="card-title">Calendar</h4>
                                <p class="text-default-400 mt-1 text-sm">See personal work or switch to a focused organization schedule.</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach (["my" => "My work", "projects" => "Projects", "production" => "Production", "publishing" => "Publishing", "reviews" => "Reviews"] as $key => $label)
                                    <button class="btn btn-sm {{ $currentView === $key ? "active bg-primary text-white" : "bg-light text-default-600" }}" data-calendar-filter="{{ $key }}" type="button">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-events-url="{{ route("calendar.events") }}" id="schedule-calendar"></div>
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
    @vite(["resources/js/pages/calendar.js"])
@endsection
