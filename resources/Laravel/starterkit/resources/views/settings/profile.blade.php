@extends("shared.base", ["title" => "Account Settings"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Settings", "title" => "Account Settings"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Settings", "title" => "Account Settings"])

                <div class="container-fluid">
                    <div class="container">
                        <form action="{{ route("profile.update") }}" class="card my-5" method="POST">
                            @csrf
                            @method("PATCH")

                            <div class="card-body">
                                @include("auth.partials.messages")

                                <div class="mb-7.5">
                                    <h4 class="card-title mb-1.5">Your account</h4>
                                    <p class="text-default-400">Keep your name and contact details current so the team knows how to reach you.</p>
                                </div>

                                <h5 class="bg-light/15 border-default-300 mb-5 flex items-center justify-center gap-1.5 rounded border border-dashed p-1.25 text-sm uppercase">
                                    <i class="iconify tabler--user-circle text-base"></i>
                                    Login details
                                </h5>

                                <div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="name">Account name</label>
                                        <input class="form-input" id="name" name="name" required type="text" value="{{ old("name", auth()->user()->name) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="email">Email address</label>
                                        <input class="form-input" id="email" name="email" required type="email" value="{{ old("email", auth()->user()->email) }}" />
                                        <p class="text-default-400 mt-1 text-xs">Changing your email requires verification again.</p>
                                    </div>
                                </div>

                                <h5 class="bg-light/15 border-default-300 my-5 flex items-center justify-center gap-1.5 rounded border border-dashed p-1.25 text-sm uppercase">
                                    <i class="iconify tabler--address-book text-base"></i>
                                    Workspace profile
                                </h5>

                                @if ($profile)
                                    <div class="mb-5 grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
                                        <div>
                                            <label class="form-label" for="display_name">Display name</label>
                                            <input class="form-input" id="display_name" name="display_name" required type="text" value="{{ old("display_name", $profile->display_name) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="title">Title</label>
                                            <input class="form-input" id="title" name="title" type="text" value="{{ old("title", $profile->title) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="phone">Phone</label>
                                            <input class="form-input" id="phone" name="phone" type="text" value="{{ old("phone", $profile->phone) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label">Organization and department</label>
                                            <div class="form-input bg-light/50 text-default-500">
                                                {{ $profile->organization->name }}
                                                @if ($profile->department)
                                                    · {{ $profile->department->name }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="lg:col-span-2">
                                            <label class="form-label" for="bio">Bio</label>
                                            <textarea class="form-textarea" id="bio" name="bio" rows="4">{{ old("bio", $profile->bio) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-5 flex flex-wrap gap-2">
                                        <span class="badge bg-light text-default-600">{{ $profile->person_type }}</span>
                                        @foreach ($profile->roleAssignments->whereNull("ended_at") as $assignment)
                                            <span class="badge bg-primary/10 text-primary">{{ $assignment->role->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <input name="display_name" type="hidden" value="{{ old("display_name", auth()->user()->name) }}" />
                                    <div class="mb-5 rounded-lg bg-warning/10 p-4 text-sm text-warning">
                                        Your login is not connected to an organization profile yet. An organization administrator can complete that setup.
                                    </div>
                                @endif

                                <div class="text-end">
                                    <button class="btn bg-success text-white hover:bg-success-hover" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection
