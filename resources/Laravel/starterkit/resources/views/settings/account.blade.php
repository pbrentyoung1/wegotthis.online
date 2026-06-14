@extends("shared.base", ["title" => "Account Settings"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Settings", "title" => "Account Settings"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Settings", "title" => "Account Settings"])

                <div class="container-fluid">
                    @include("auth.partials.messages")

                    {{-- Hero card with upload capability --}}
                    <div class="card mb-base overflow-hidden">

                        {{-- Banner --}}
                        <div class="relative h-44 overflow-hidden" id="banner-area">
                            @if ($profile?->banner_url)
                                <img id="banner-preview-img" src="{{ $profile->banner_url }}" class="h-full w-full object-cover" />
                                <div id="banner-placeholder" class="hidden absolute inset-0 bg-gradient-to-r from-primary/80 to-primary/40"></div>
                            @else
                                <div id="banner-placeholder" class="h-full w-full bg-gradient-to-r from-primary/80 to-primary/40"></div>
                                <img id="banner-preview-img" src="" class="hidden absolute inset-0 h-full w-full object-cover" />
                            @endif

                            @if ($profile)
                                <input accept="image/*" class="hidden" id="banner-file-input" type="file"
                                    data-upload-url="{{ route('profile.banner') }}" />
                                <button class="absolute inset-0 flex cursor-pointer items-center justify-center bg-black/0 transition-colors hover:bg-black/30 group"
                                    onclick="document.getElementById('banner-file-input').click()" type="button">
                                    <div class="flex items-center gap-2 text-white opacity-0 transition-opacity group-hover:opacity-100">
                                        <i class="iconify tabler--camera text-xl"></i>
                                        <span class="text-sm font-medium">Change cover</span>
                                    </div>
                                </button>
                            @endif
                        </div>

                        {{-- Avatar + name row --}}
                        <div class="card-body">
                            <div class="-mt-16 flex flex-wrap items-end justify-between gap-4">
                                <div class="flex items-end gap-4">
                                    <div class="relative shrink-0">
                                        @php($avatarUrl = $profile?->avatar_url ?: "/images/users/user-1.jpg")
                                        @if ($profile)
                                            <input accept="image/*" class="hidden" id="avatar-file-input" type="file"
                                                data-upload-url="{{ route('profile.avatar') }}" />
                                            <button class="group relative block" onclick="document.getElementById('avatar-file-input').click()"
                                                title="Change photo" type="button">
                                                <img alt="{{ $profile->display_name }}" id="avatar-preview-img"
                                                    class="size-24 rounded-full border-4 border-white object-cover shadow dark:border-default-700"
                                                    src="{{ $avatarUrl }}" />
                                                <span class="absolute inset-0 flex items-center justify-center rounded-full bg-black/40 opacity-0 transition-opacity group-hover:opacity-100">
                                                    <i class="iconify tabler--camera text-2xl text-white"></i>
                                                </span>
                                            </button>
                                        @else
                                            <img alt="{{ auth()->user()->name }}"
                                                class="size-24 rounded-full border-4 border-white object-cover shadow dark:border-default-700"
                                                src="{{ $avatarUrl }}" />
                                        @endif
                                    </div>
                                    <div class="mb-1">
                                        <h4 class="text-lg font-bold">{{ $profile?->display_name ?? auth()->user()->name }}</h4>
                                        @if ($profile?->title)
                                            <p class="text-default-400 text-sm">{{ $profile->title }}</p>
                                        @endif
                                    </div>
                                </div>
                                <a class="btn btn-sm bg-light text-default-700 mb-1" href="{{ route('profile.show') }}">
                                    <i class="iconify tabler--user-circle me-1.5 size-4"></i>View profile
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($profile)
                        <div class="grid grid-cols-1 gap-base lg:grid-cols-3">
                            {{-- Left sidebar: read-only info --}}
                            <div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Personal details</h4>
                                    </div>
                                    <div class="card-body space-y-3">
                                        @if ($profile->title)
                                            <div class="flex items-center gap-3">
                                                <div class="btn btn-icon size-8 bg-light shrink-0">
                                                    <i class="iconify tabler--briefcase text-secondary size-4"></i>
                                                </div>
                                                <p class="text-sm">{{ $profile->title }}</p>
                                            </div>
                                        @endif
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
                                        <div class="flex items-center gap-3">
                                            <div class="btn btn-icon size-8 bg-light shrink-0">
                                                <i class="iconify tabler--mail text-secondary size-4"></i>
                                            </div>
                                            <a class="truncate text-sm text-primary hover:underline" href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                                        </div>
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
                            </div>

                            {{-- Right: edit form --}}
                            <div class="lg:col-span-2">
                                <form action="{{ route("profile.update") }}" class="card" method="POST">
                                    @csrf
                                    @method("PATCH")

                                    <div class="card-header">
                                        <h4 class="card-title">Account settings</h4>
                                    </div>
                                    <div class="card-body space-y-6">
                                        <div>
                                            <h5 class="mb-4 text-xs font-semibold uppercase tracking-wide text-default-400">Login details</h5>
                                            <div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
                                                <div>
                                                    <label class="form-label" for="name">Account name</label>
                                                    <input class="form-input" id="name" name="name" required type="text" value="{{ old("name", auth()->user()->name) }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label" for="email">Email address</label>
                                                    <input class="form-input" id="email" name="email" required type="email" value="{{ old("email", auth()->user()->email) }}" />
                                                    <p class="mt-1 text-xs text-default-400">Changing your email requires verification again.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-t border-default-200 pt-6">
                                            <h5 class="mb-4 text-xs font-semibold uppercase tracking-wide text-default-400">Workspace profile</h5>
                                            <div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
                                                <div>
                                                    <label class="form-label" for="display_name">Display name</label>
                                                    <input class="form-input" id="display_name" name="display_name" required type="text" value="{{ old("display_name", $profile->display_name) }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label" for="title">Title</label>
                                                    <input class="form-input" id="title" name="title" placeholder="e.g. Worship Director" type="text" value="{{ old("title", $profile->title) }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input class="form-input" id="phone" name="phone" type="text" value="{{ old("phone", $profile->phone) }}" />
                                                </div>
                                                <div>
                                                    <label class="form-label">Organization &amp; department</label>
                                                    <div class="form-input bg-light/50 text-default-500">
                                                        {{ $profile->organization->name }}
                                                        @if ($profile->department)
                                                            · {{ $profile->department->name }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="lg:col-span-2">
                                                    <label class="form-label" for="bio">Bio</label>
                                                    <textarea class="form-textarea" id="bio" name="bio" placeholder="A short bio visible to your teammates..." rows="3">{{ old("bio", $profile->bio) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer flex justify-end">
                                        <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @else
                        <form action="{{ route("profile.update") }}" class="card" method="POST">
                            @csrf
                            @method("PATCH")
                            <input name="display_name" type="hidden" value="{{ old("display_name", auth()->user()->name) }}" />

                            <div class="card-header">
                                <h4 class="card-title">Account settings</h4>
                            </div>
                            <div class="card-body space-y-5">
                                <div class="rounded-lg bg-warning/10 p-4 text-sm text-warning">
                                    Your login is not connected to an organization profile yet. An administrator can complete that setup.
                                </div>
                                <div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
                                    <div>
                                        <label class="form-label" for="name">Account name</label>
                                        <input class="form-input" id="name" name="name" required type="text" value="{{ old("name", auth()->user()->name) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="email">Email address</label>
                                        <input class="form-input" id="email" name="email" required type="email" value="{{ old("email", auth()->user()->email) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer flex justify-end">
                                <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">Save changes</button>
                            </div>
                        </form>
                    @endif
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")

    {{-- Crop modal --}}
    @if ($profile)
        <div id="crop-modal" class="fixed inset-0 z-[100] hidden">
            <div id="crop-modal-backdrop" class="absolute inset-0 bg-black/60"></div>
            <div class="relative z-10 flex h-full items-center justify-center p-4">
                <div class="flex w-full max-w-xl flex-col rounded-lg bg-white shadow-xl dark:bg-default-800">
                    <div class="flex items-center justify-between border-b border-default-200 px-5 py-4">
                        <h5 class="font-semibold" id="crop-modal-title">Crop image</h5>
                        <button class="crop-cancel btn btn-icon btn-sm bg-light" type="button">
                            <i class="iconify tabler--x size-4"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <div class="overflow-hidden rounded-md bg-default-100" style="max-height: 380px;">
                            <img id="crop-source" src="" class="block max-w-full" alt="" />
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3 border-t border-default-200 px-5 py-4">
                        <div class="flex gap-2">
                            <button id="crop-zoom-in" class="btn btn-sm bg-light" type="button" title="Zoom in">
                                <i class="iconify tabler--zoom-in size-4"></i>
                            </button>
                            <button id="crop-zoom-out" class="btn btn-sm bg-light" type="button" title="Zoom out">
                                <i class="iconify tabler--zoom-out size-4"></i>
                            </button>
                            <button id="crop-rotate-left" class="btn btn-sm bg-light" type="button" title="Rotate left">
                                <i class="iconify tabler--rotate-2 size-4"></i>
                            </button>
                            <button id="crop-rotate-right" class="btn btn-sm bg-light" type="button" title="Rotate right">
                                <i class="iconify tabler--rotate-clockwise-2 size-4"></i>
                            </button>
                        </div>
                        <div class="flex gap-2">
                            <button class="crop-cancel btn bg-light text-default-700" type="button">Cancel</button>
                            <button id="crop-save" class="btn bg-primary text-white hover:bg-primary-hover" type="button">
                                <span id="crop-save-label">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @vite('resources/js/pages/profile-image.js')

        <style>
            #crop-modal.crop-circle .cropper-view-box,
            #crop-modal.crop-circle .cropper-face {
                border-radius: 50%;
            }
            #crop-modal.crop-banner .cropper-view-box,
            #crop-modal.crop-banner .cropper-face {
                border-radius: 0.375rem;
            }
        </style>
    @endif
@endsection
