@extends("shared.base", ["title" => "People"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $currentProfile->organization->name, "title" => "People"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => $currentProfile->organization->name, "title" => "People"])

                <div class="container-fluid">
                    <form action="{{ route("people.index") }}" class="card mb-base" method="GET">
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-base xl:grid-cols-4">
                                <div class="xl:col-span-2">
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--search input-icon text-default-400"></i>
                                        <input class="form-input" name="search" placeholder="Search people..." type="search" value="{{ $filters["search"] }}" />
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select" name="department">
                                        <option value="">All departments</option>
                                        @foreach ($departments as $department)
                                            <option @selected($filters["department"] === $department->slug) value="{{ $department->slug }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex gap-2">
                                    <select class="form-select" name="person_type">
                                        <option value="">All people</option>
                                        @foreach ($personTypes as $personType)
                                            <option @selected($filters["person_type"] === $personType) value="{{ $personType }}">{{ $personType }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn bg-secondary text-white hover:bg-secondary-hover" type="submit">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <h4 class="text-base font-semibold">{{ $profiles->total() }} people</h4>
                            <p class="text-default-400 text-sm">Staff, contributors, ministry contacts, vendors, and reviewers connected to your organization.</p>
                        </div>
                        @if ($canInviteUsers)
                            <a class="btn btn-sm bg-primary text-white hover:bg-primary-hover" href="{{ route("users.create") }}">
                                <i class="iconify tabler--user-plus me-1"></i>New User
                            </a>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($profiles as $profile)
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-5 flex items-start gap-4">
                                        <a href="{{ route('people.show', $profile) }}" class="shrink-0">
                                            @if ($profile->avatar_url)
                                                <img alt="{{ $profile->display_name }}" class="size-14 rounded-full object-cover" src="{{ $profile->avatar_url }}" />
                                            @else
                                                <div class="bg-primary/10 text-primary flex size-14 items-center justify-center rounded-full text-lg font-semibold">
                                                    {{ str($profile->display_name)->explode(" ")->filter()->map(fn ($part) => str($part)->substr(0, 1)->upper())->take(2)->implode("") }}
                                                </div>
                                            @endif
                                        </a>
                                        <div class="min-w-0 grow">
                                            <a class="hover:text-primary" href="{{ route('people.show', $profile) }}">
                                                <h5 class="truncate text-base font-semibold">{{ $profile->display_name }}</h5>
                                            </a>
                                            <p class="text-default-400 truncate">{{ $profile->title ?: "Organization contact" }}</p>
                                            <div class="mt-2 flex flex-wrap gap-1.5">
                                                <span class="badge bg-light text-default-600">{{ $profile->person_type }}</span>
                                                @foreach ($profile->roleAssignments->whereNull("ended_at") as $assignment)
                                                    <span class="badge bg-primary/10 text-primary">{{ $assignment->role->name }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- Three-dot menu --}}
                                        <div class="hs-dropdown relative shrink-0 [--placement:bottom-right]">
                                            <button aria-expanded="false" aria-haspopup="menu" class="btn btn-icon btn-sm bg-transparent text-default-400 hover:bg-light hover:text-default-700" type="button">
                                                <i class="iconify tabler--dots-vertical size-4"></i>
                                            </button>
                                            <div class="hs-dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{ route('people.show', $profile) }}">
                                                    <i class="iconify tabler--user-circle me-2 text-base"></i>View profile
                                                </a>
                                                @if ($profile->user?->email)
                                                    <a class="dropdown-item" href="mailto:{{ $profile->user->email }}">
                                                        <i class="iconify tabler--mail me-2 text-base"></i>Send email
                                                    </a>
                                                @endif
                                                @if ($profile->phone)
                                                    <a class="dropdown-item" href="tel:{{ $profile->phone }}">
                                                        <i class="iconify tabler--phone me-2 text-base"></i>Call
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="text-default-500 space-y-2.5 text-sm">
                                        @if ($profile->department)
                                            <li class="flex items-center gap-2.5">
                                                <i class="iconify tabler--building-community text-default-400"></i>
                                                <span>{{ $profile->department->name }}</span>
                                            </li>
                                        @endif
                                        @if ($profile->user?->email || data_get($profile->metadata_json, "contact_email"))
                                            <li class="flex items-center gap-2.5">
                                                <i class="iconify tabler--mail text-default-400"></i>
                                                <a class="truncate hover:text-primary" href="mailto:{{ $profile->user?->email ?? data_get($profile->metadata_json, "contact_email") }}">
                                                    {{ $profile->user?->email ?? data_get($profile->metadata_json, "contact_email") }}
                                                </a>
                                            </li>
                                        @endif
                                        @if ($profile->phone)
                                            <li class="flex items-center gap-2.5">
                                                <i class="iconify tabler--phone text-default-400"></i>
                                                <a class="hover:text-primary" href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <div class="card md:col-span-2 xl:col-span-3">
                                <div class="card-body py-12 text-center">
                                    <i class="iconify tabler--users-minus text-default-300 mb-3 size-10"></i>
                                    <h4 class="mb-1 text-base font-semibold">No people match those filters</h4>
                                    <a class="text-primary underline underline-offset-4" href="{{ route("people.index") }}">Clear filters</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if ($profiles->hasPages())
                        <div class="mt-5 flex justify-between">
                            <div>
                                @if ($profiles->previousPageUrl())
                                    <a class="btn bg-light text-default-700" href="{{ $profiles->previousPageUrl() }}">Previous</a>
                                @endif
                            </div>
                            <div>
                                @if ($profiles->nextPageUrl())
                                    <a class="btn bg-primary text-white" href="{{ $profiles->nextPageUrl() }}">Next</a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection
