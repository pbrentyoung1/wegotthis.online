@extends("shared.base", ["title" => "New User"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Admin", "title" => "New User"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Admin", "title" => "New User"])
                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route("people.index") }}">
                            <i class="iconify tabler--arrow-left me-1"></i>Back to People
                        </a>
                    </div>

                    @include("auth.partials.messages")

                    <div class="grid grid-cols-1 gap-base lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Add a new user</h4>
                                        <p class="text-default-400 mt-1 text-sm">They'll receive an email to set their password and access the workspace.</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route("users.store") }}" class="space-y-5" method="POST">
                                        @csrf

                                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                            <div>
                                                <label class="form-label" for="name">Full name <span class="text-danger">*</span></label>
                                                <input
                                                    class="form-input @error("name") is-invalid @enderror"
                                                    id="name"
                                                    name="name"
                                                    placeholder="Jane Smith"
                                                    required
                                                    type="text"
                                                    value="{{ old("name") }}"
                                                />
                                                @error("name")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="form-label" for="email">Email address <span class="text-danger">*</span></label>
                                                <input
                                                    class="form-input @error("email") is-invalid @enderror"
                                                    id="email"
                                                    name="email"
                                                    placeholder="jane@yourchurch.org"
                                                    required
                                                    type="email"
                                                    value="{{ old("email") }}"
                                                />
                                                @error("email")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                            <div>
                                                <label class="form-label" for="display_name">Display name</label>
                                                <input
                                                    class="form-input @error("display_name") is-invalid @enderror"
                                                    id="display_name"
                                                    name="display_name"
                                                    placeholder="Defaults to full name"
                                                    type="text"
                                                    value="{{ old("display_name") }}"
                                                />
                                                @error("display_name")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="form-label" for="title">Title / role</label>
                                                <input
                                                    class="form-input @error("title") is-invalid @enderror"
                                                    id="title"
                                                    name="title"
                                                    placeholder="e.g. Worship Director"
                                                    type="text"
                                                    value="{{ old("title") }}"
                                                />
                                                @error("title")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                            <div>
                                                <label class="form-label" for="department_id">Department</label>
                                                <select class="form-select @error("department_id") is-invalid @enderror" id="department_id" name="department_id">
                                                    <option value="">No department</option>
                                                    @foreach ($departments as $department)
                                                        <option @selected(old("department_id") == $department->id) value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("department_id")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="form-label" for="person_type">Person type <span class="text-danger">*</span></label>
                                                <select class="form-select @error("person_type") is-invalid @enderror" id="person_type" name="person_type" required>
                                                    @foreach (["Staff", "Contractor", "Volunteer", "Vendor Contact", "External Reviewer", "Ministry Contact"] as $type)
                                                        <option @selected(old("person_type", "Staff") === $type) value="{{ $type }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                                @error("person_type")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        @if ($roles->isNotEmpty())
                                            <div>
                                                <label class="form-label" for="role_id">Role</label>
                                                <select class="form-select @error("role_id") is-invalid @enderror" id="role_id" name="role_id">
                                                    <option value="">No role assigned</option>
                                                    @foreach ($roles as $role)
                                                        <option @selected(old("role_id") == $role->id) value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("role_id")
                                                    <p class="text-danger mt-1 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="border-t border-default-200 pt-5 flex items-center justify-between">
                                            <a class="btn bg-light text-default-700" href="{{ route("people.index") }}">Cancel</a>
                                            <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">
                                                <i class="iconify tabler--user-plus me-1"></i>Add user &amp; send invite
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">About invitations</h4>
                                </div>
                                <div class="card-body text-sm text-default-500 space-y-3">
                                    <p>The new user will receive an email with a link to set their password.</p>
                                    <p>They'll be added to your organization and can log in once they complete setup.</p>
                                    <p>You can assign roles and permissions from their profile after they've been created.</p>
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
