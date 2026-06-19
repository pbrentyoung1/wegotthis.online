@extends("shared.base", ["title" => $project->title . " — Calendar"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Projects", "title" => $project->title])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", [
                    "subtitle" => "Projects",
                    "subtitleUrl" => route("projects.index"),
                    "title" => $project->title,
                ])

                <div class="container-fluid">
                    @include("auth.partials.messages")
                    @include("projects.partials.view-switcher", [
                        "activeView" => "calendar",
                        "canManageProject" => $currentProfile->hasPermission("projects.manage"),
                        "canCloseoutProject" => $canManageDates,
                    ])

                    @if ($canManageDates)
                        <div class="card mb-base">
                            <div class="card-header">
                                <div>
                                    <h4 class="card-title">Project window</h4>
                                    <p class="text-default-400 mt-1 text-sm">Set the overall start and stop dates shown on this calendar.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("projects.calendar.dates", $project) }}" class="grid grid-cols-1 items-end gap-4 md:grid-cols-[1fr_1fr_auto]" method="POST">
                                    @csrf
                                    @method("PATCH")
                                    <input name="source_type" type="hidden" value="project" />
                                    <div>
                                        <label class="form-label">Start date</label>
                                        <input class="form-input" data-provider="flatpickr" name="start_date" value="{{ $project->start_date?->format("Y-m-d") }}" />
                                    </div>
                                    <div>
                                        <label class="form-label">Stop date</label>
                                        <input class="form-input" data-provider="flatpickr" name="stop_date" value="{{ $project->stop_date?->format("Y-m-d") }}" />
                                    </div>
                                    <button class="btn bg-light text-default-700" type="submit">Update dates</button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h4 class="card-title">Project calendar</h4>
                                <p class="text-default-400 mt-1 text-sm">Project dates, deliverable deadlines, publishing dates, and task due dates in one view.</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-events-url="{{ route("projects.calendar.events", $project) }}" id="schedule-calendar"></div>
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
    @vite(["resources/js/pages/calendar.js", "resources/js/pages/project-view-switcher.js"])
@endsection
