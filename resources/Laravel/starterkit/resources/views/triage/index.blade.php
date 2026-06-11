@extends("shared.base", ["title" => "Intake Queue"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $currentProfile->organization->name, "title" => "Intake Queue"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Requests", "title" => "Intake Queue"])
                <div class="container-fluid">
                    <form action="{{ route("triage.index") }}" class="card mb-base" method="GET">
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
                                <div class="lg:col-span-2">
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--search input-icon text-default-400"></i>
                                        <input class="form-input" name="search" placeholder="Search requests, requesters, or departments..." type="search" value="{{ $filters["search"] }}" />
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select" name="queue">
                                        @foreach ($queueOptions as $value => $label)
                                            <option @selected($filters["queue"] === $value) value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">Filter</button>
                                    <a class="btn bg-light text-default-700 hover:bg-default-200" href="{{ route("triage.index") }}">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="mb-5">
                        <h4 class="text-base font-semibold">{{ $requests->total() }} requests</h4>
                        <p class="text-default-400 text-sm">Review submitted requests, request clarification, and record intake decisions.</p>
                    </div>

                    <div class="card">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-light text-default-500">
                                    <tr>
                                        <th class="px-5 py-3 text-start font-medium">Request</th>
                                        <th class="px-5 py-3 text-start font-medium">Requester</th>
                                        <th class="px-5 py-3 text-start font-medium">Status</th>
                                        <th class="px-5 py-3 text-start font-medium">Submitted</th>
                                        <th class="px-5 py-3 text-start font-medium">Last activity</th>
                                        <th class="px-5 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    @forelse ($requests as $ministryRequest)
                                        <tr>
                                            <td class="px-5 py-4">
                                                <p class="font-semibold">{{ $ministryRequest->title }}</p>
                                                <p class="text-default-400 mt-1">{{ $ministryRequest->department?->name ?: "No department selected" }}</p>
                                            </td>
                                            <td class="px-5 py-4">{{ $ministryRequest->requesterProfile->display_name }}</td>
                                            <td class="px-5 py-4"><span class="badge {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span></td>
                                            <td class="px-5 py-4 text-default-500">{{ $ministryRequest->submitted_at?->format("M j, Y") ?: "Not recorded" }}</td>
                                            <td class="px-5 py-4">
                                                <p class="font-medium">{{ $ministryRequest->updated_at->diffForHumans() }}</p>
                                                <p class="text-default-400 mt-1 text-xs" title="{{ $ministryRequest->updated_at->format("M j, Y g:i A") }}">{{ $ministryRequest->updated_at->format("M j, Y g:i A") }}</p>
                                            </td>
                                            <td class="px-5 py-4 text-end"><a class="text-primary font-medium hover:underline" href="{{ route("triage.show", $ministryRequest) }}">Review</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-5 py-12 text-center text-default-400" colspan="6">No requests match this queue view.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
