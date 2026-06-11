@extends("shared.base", ["title" => "My Requests"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $currentProfile->organization->name, "title" => "My Requests"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Requests", "title" => "My Requests"])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h4 class="text-base font-semibold">Your ministry requests</h4>
                            <p class="text-default-400 text-sm">Track drafts and requests you have submitted to the communications team.</p>
                        </div>
                        <a class="btn bg-primary text-white hover:bg-primary-hover" href="{{ route("requests.create") }}">
                            <i class="iconify tabler--plus me-1"></i>
                            New request
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
                        @forelse ($requests as $ministryRequest)
                            <a class="card block transition hover:-translate-y-0.5 hover:shadow-md" href="{{ route("requests.show", $ministryRequest) }}">
                                <div class="card-body">
                                    <div class="mb-4 flex items-start justify-between gap-4">
                                        <div>
                                            <h5 class="text-base font-semibold">{{ $ministryRequest->title }}</h5>
                                            <p class="text-default-400 mt-1 text-sm">{{ $ministryRequest->department?->name ?: "No department selected" }}</p>
                                        </div>
                                        <span class="badge {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span>
                                    </div>
                                    <p class="text-default-500 line-clamp-2 text-sm">{{ $ministryRequest->ministry_need ?: "This draft does not have a ministry need yet." }}</p>
                                    <p class="text-default-400 mt-4 text-xs">Updated {{ $ministryRequest->updated_at->diffForHumans() }}</p>
                                </div>
                            </a>
                        @empty
                            <div class="card lg:col-span-2">
                                <div class="card-body py-12 text-center">
                                    <i class="iconify tabler--clipboard-plus text-default-300 mb-3 size-10"></i>
                                    <h4 class="mb-1 text-base font-semibold">No requests yet</h4>
                                    <p class="text-default-400 mb-4">Start with the ministry outcome and the communications team will help plan the work.</p>
                                    <a class="btn bg-primary text-white hover:bg-primary-hover" href="{{ route("requests.create") }}">Create your first request</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if ($requests->hasPages())
                        <div class="mt-5">{{ $requests->links() }}</div>
                    @endif
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection
