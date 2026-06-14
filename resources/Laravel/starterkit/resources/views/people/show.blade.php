@extends("shared.base", ["title" => $profile->display_name])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "People", "title" => $profile->display_name])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "People", "subtitleUrl" => route("people.index"), "title" => $profile->display_name])

                <div class="container-fluid">

                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route('people.index') }}">
                            <i class="iconify tabler--arrow-left me-1"></i>Back to People
                        </a>
                    </div>

                    {{-- Hero card --}}
                    <div class="card mb-base overflow-hidden">
                        <div class="h-44 overflow-hidden">
                            @if ($profile->banner_url)
                                <img src="{{ $profile->banner_url }}" class="h-full w-full object-cover" />
                            @else
                                <div class="h-full w-full bg-gradient-to-r from-primary/80 to-primary/40"></div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="-mt-16 flex flex-wrap items-end justify-between gap-4">
                                <div class="flex items-end gap-4">
                                    <div class="shrink-0">
                                        @if ($profile->avatar_url)
                                            <img alt="{{ $profile->display_name }}"
                                                class="size-24 rounded-full border-4 border-white object-cover shadow dark:border-default-700"
                                                src="{{ $profile->avatar_url }}" />
                                        @else
                                            <div class="flex size-24 items-center justify-center rounded-full border-4 border-white bg-primary/10 text-2xl font-semibold text-primary shadow dark:border-default-700">
                                                {{ str($profile->display_name)->explode(' ')->filter()->map(fn ($p) => str($p)->substr(0, 1)->upper())->take(2)->implode('') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-1">
                                        <h4 class="text-lg font-bold">{{ $profile->display_name }}</h4>
                                        @if ($profile->title)
                                            <p class="text-default-400 text-sm">{{ $profile->title }}</p>
                                        @endif
                                        <div class="mt-2 flex flex-wrap gap-1.5">
                                            <span class="badge bg-light text-default-600">{{ $profile->person_type }}</span>
                                            @foreach ($profile->roleAssignments->whereNull('ended_at') as $assignment)
                                                <span class="badge bg-primary/10 text-primary">{{ $assignment->role->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- Quick actions --}}
                                @if ($profile->user?->email)
                                    <a class="btn btn-sm bg-light text-default-700 mb-1" href="mailto:{{ $profile->user->email }}">
                                        <i class="iconify tabler--mail me-1.5 size-4"></i>Send email
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-3">
                        {{-- Left sidebar --}}
                        <div class="space-y-base">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Details</h4>
                                </div>
                                <div class="card-body space-y-3">
                                    <div class="flex items-center gap-3">
                                        <div class="btn btn-icon size-8 bg-light shrink-0">
                                            <i class="iconify tabler--building text-secondary size-4"></i>
                                        </div>
                                        <p class="text-sm">
                                            {{ $profile->organization->name }}
                                            @if ($profile->department)
                                                <span class="text-default-400">· {{ $profile->department->name }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    @if ($profile->user?->email)
                                        <div class="flex items-center gap-3">
                                            <div class="btn btn-icon size-8 bg-light shrink-0">
                                                <i class="iconify tabler--mail text-secondary size-4"></i>
                                            </div>
                                            <a class="truncate text-sm text-primary hover:underline" href="mailto:{{ $profile->user->email }}">{{ $profile->user->email }}</a>
                                        </div>
                                    @endif
                                    @if ($profile->phone)
                                        <div class="flex items-center gap-3">
                                            <div class="btn btn-icon size-8 bg-light shrink-0">
                                                <i class="iconify tabler--phone text-secondary size-4"></i>
                                            </div>
                                            <a class="text-sm hover:text-primary" href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                                        </div>
                                    @endif
                                    @if ($profile->bio)
                                        <div class="border-t border-default-200 pt-3">
                                            <p class="text-default-500 text-sm">{{ $profile->bio }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Skills placeholder --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="iconify tabler--sparkles text-primary me-1.5"></i>Skills
                                    </h4>
                                </div>
                                <div class="card-body py-8 text-center">
                                    <p class="text-default-400 text-sm">Skills coming soon.</p>
                                </div>
                            </div>
                        </div>

                        {{-- Right: future widgets --}}
                        <div class="lg:col-span-2">
                            <div class="card">
                                <div class="card-body py-14 text-center">
                                    <i class="iconify tabler--layout-dashboard text-default-300 mb-3 size-10"></i>
                                    <p class="font-semibold">Profile widgets coming soon</p>
                                    <p class="text-default-400 mt-1 text-sm">Activity, calendar, and shared projects will appear here.</p>
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
