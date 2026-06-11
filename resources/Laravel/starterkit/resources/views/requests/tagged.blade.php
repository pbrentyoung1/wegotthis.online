@extends("shared.base", ["title" => "Tagged Requests"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $currentProfile->organization->name, "title" => "Tagged Requests"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Requests", "title" => "Tagged Requests"])
                <div class="container-fluid">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h4 class="text-base font-semibold">Requests you are tagged on</h4>
                            <p class="text-default-400 text-sm">Requests where you have been added as a reviewer or participant.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="table-wrapper">
                            <table class="table table-custom table-centered table-hover w-full">
                                <thead class="bg-light/25 thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th>Request</th>
                                        <th>Submitted by</th>
                                        <th>Status</th>
                                        <th>Messages</th>
                                        <th>Last activity</th>
                                        <th class="text-end w-[1%]">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-default-300 divide-y whitespace-nowrap">
                                    @forelse ($requests as $ministryRequest)
                                        <tr>
                                            <td>
                                                <div class="min-w-72">
                                                    <h5 class="hover:text-primary mb-1.25 font-semibold">
                                                        <a href="{{ route("requests.show", $ministryRequest) }}">{{ $ministryRequest->title }}</a>
                                                    </h5>
                                                    <div class="flex items-center gap-2 text-2xs text-default-400">
                                                        <i class="iconify tabler--message-circle shrink-0 text-sm"></i>
                                                        <span class="max-w-md truncate">{{ $ministryRequest->ministry_need ?: "No description provided." }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $ministryRequest->requesterProfile?->display_name ?: "Unknown" }}</td>
                                            <td><span class="badge badge-label {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span></td>
                                            <td>
                                                @php($messageCount = $ministryRequest->conversation?->messages_count ?? 0)
                                                <span class="inline-flex items-center gap-1 text-sm">
                                                    <i class="iconify tabler--messages text-default-400"></i>
                                                    {{ $messageCount }}
                                                </span>
                                            </td>
                                            <td>
                                                <p class="font-medium">{{ $ministryRequest->updated_at->diffForHumans() }}</p>
                                                <p class="text-default-400 text-xs">{{ $ministryRequest->updated_at->format("M j, Y g:i A") }}</p>
                                            </td>
                                            <td class="text-end">
                                                <a class="text-primary inline-flex items-center gap-1 font-medium hover:underline" href="{{ route("requests.show", $ministryRequest) }}">
                                                    Open
                                                    <i class="iconify tabler--chevron-right text-sm"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="py-12 text-center" colspan="6">
                                                <i class="iconify tabler--tag text-default-300 mb-3 size-10"></i>
                                                <h4 class="mb-1 text-base font-semibold">No tagged requests</h4>
                                                <p class="text-default-400">When you are added as a reviewer on a request, it will appear here.</p>
                                            </td>
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
