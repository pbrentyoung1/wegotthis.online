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

                    <div class="card">
                        <div class="overflow-x-auto">
                            <table class="table-custom table-centered table-hover w-full">
                                <thead class="thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th>Request</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Important date</th>
                                        <th>Last activity</th>
                                        <th class="text-center w-[1%]">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-default-300 divide-y">
                                    @forelse ($requests as $ministryRequest)
                                        @php($importantDate = data_get($ministryRequest->key_dates_json, "action_deadline") ?: data_get($ministryRequest->key_dates_json, "registration_deadline") ?: data_get($ministryRequest->key_dates_json, "needed_by") ?: data_get($ministryRequest->key_dates_json, "event_date") ?: data_get($ministryRequest->key_dates_json, "event_starts_on"))
                                        <tr>
                                            <td>
                                                <div class="flex gap-base">
                                                    <div class="bg-light text-default-400 flex size-9 shrink-0 items-center justify-center rounded">
                                                        <i class="iconify tabler--message-2 text-xl"></i>
                                                    </div>
                                                    <div class="min-w-0">
                                                        <h5 class="hover:text-primary mb-1 font-semibold"><a href="{{ route("requests.show", $ministryRequest) }}">{{ $ministryRequest->title }}</a></h5>
                                                        <p class="text-default-400 max-w-md truncate text-xs">{{ $ministryRequest->ministry_need ?: "This draft does not have a ministry need yet." }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $ministryRequest->department?->name ?: "Not selected" }}</td>
                                            <td><span class="badge badge-label {{ $ministryRequest->status->badgeClasses() }}">{{ $ministryRequest->status->value }}</span></td>
                                            <td>{{ $importantDate ?: "Not provided" }}</td>
                                            <td>
                                                <p class="font-medium">{{ $ministryRequest->updated_at->diffForHumans() }}</p>
                                                <p class="text-default-400 text-xs">{{ $ministryRequest->updated_at->format("M j, Y g:i A") }}</p>
                                            </td>
                                            <td>
                                                <div class="flex justify-center gap-1.25">
                                                    <a aria-label="View {{ $ministryRequest->title }}" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" href="{{ route("requests.show", $ministryRequest) }}">
                                                        <i class="iconify tabler--eye text-base"></i>
                                                    </a>
                                                    @if (in_array($ministryRequest->status, [\App\Enums\RequestStatus::Draft, \App\Enums\RequestStatus::NeedsClarification], true))
                                                        <a aria-label="Update {{ $ministryRequest->title }}" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" href="{{ route("requests.edit", $ministryRequest) }}">
                                                            <i class="iconify tabler--edit text-base"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="py-12 text-center" colspan="6">
                                                <i class="iconify tabler--clipboard-plus text-default-300 mb-3 size-10"></i>
                                                <h4 class="mb-1 text-base font-semibold">No requests yet</h4>
                                                <p class="text-default-400 mb-4">Start with the ministry outcome and the communications team will help plan the work.</p>
                                                <a class="btn bg-primary text-white hover:bg-primary-hover" href="{{ route("requests.create") }}">Create your first request</a>
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
