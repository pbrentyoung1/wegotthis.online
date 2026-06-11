@extends("shared.base", ["title" => "Projects"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => $currentProfile->organization->name, "title" => "Projects"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Work", "title" => "Projects"])
                <div class="container-fluid">
                    <div class="mb-5">
                        <h4 class="text-base font-semibold">Active project workspace</h4>
                        <p class="text-default-400 text-sm">Projects created from accepted ministry requests.</p>
                    </div>

                    <div class="card">
                        <div class="table-wrapper">
                            <table class="table table-custom table-centered table-hover w-full">
                                <thead class="bg-light/25 thead-sm">
                                    <tr class="bg-light/25 text-2xs uppercase">
                                        <th>Project</th>
                                        <th>Members</th>
                                        <th>Status</th>
                                        <th>Deliverables</th>
                                        <th>Department</th>
                                        <th>Last activity</th>
                                        <th class="text-end w-[1%]">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-default-300 divide-y whitespace-nowrap">
                                    @forelse ($projects as $project)
                                        <tr>
                                            <td>
                                                <div class="flex items-center gap-3">
                                                    <div class="bg-primary/10 text-primary flex size-9 items-center justify-center rounded">
                                                        <i class="iconify tabler--briefcase text-xl"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="hover:text-primary font-semibold"><a href="{{ route("projects.show", $project) }}">{{ $project->title }}</a></h5>
                                                        <p class="text-default-400 text-xs">{{ $project->project_type }} · owned by {{ $project->ownerProfile?->display_name ?: "Unassigned" }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    @foreach ($project->members->take(4) as $member)
                                                        @if ($member->profile->avatar_url)
                                                            <img alt="{{ $member->profile->display_name }}" class="{{ $loop->first ? "" : "-ms-1.5" }} size-7 rounded-full border-2 border-white object-cover" src="{{ $member->profile->avatar_url }}" title="{{ $member->profile->display_name }} · {{ $member->project_role }}" />
                                                        @else
                                                            <span class="bg-light text-default-600 {{ $loop->first ? "" : "-ms-1.5" }} flex size-7 items-center justify-center rounded-full border-2 border-white text-xs font-semibold">{{ str($member->profile->display_name)->substr(0, 1) }}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary/10 text-primary">{{ $project->lifecycle_status }}</span></td>
                                            <td>{{ $project->deliverables_count }}</td>
                                            <td>{{ $project->department?->name ?: "Not selected" }}</td>
                                            <td>{{ $project->updated_at->diffForHumans() }}</td>
                                            <td class="text-end"><a class="text-primary font-medium hover:underline" href="{{ route("projects.show", $project) }}">Open</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="py-12 text-center" colspan="7">
                                                <i class="iconify tabler--briefcase text-default-300 mb-3 size-10"></i>
                                                <h4 class="mb-1 text-base font-semibold">No projects yet</h4>
                                                <p class="text-default-400">Accepted requests can be converted into Projects from the Intake Queue.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if ($projects->hasPages())
                        <div class="mt-5">{{ $projects->links() }}</div>
                    @endif
                </div>
            </main>
            @include("shared.partials.footer")
        </div>
    </div>
    @include("shared.partials.customizer")
@endsection
