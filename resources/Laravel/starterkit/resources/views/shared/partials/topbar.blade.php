@php($currentAvatarUrl = auth()->user()->profiles()->where("status", "Active")->orderBy("id")->value("avatar_url") ?: "/images/users/user-1.jpg")
<header class="app-header">
    <div class="container-fluid flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="logo-topbar">
                <!-- Sidenav Menu Brand Logo -->
                <a class="logo-box" href="{{ url("/") }}">
                    <!-- Dark Brand Logo (light backgrounds) -->
                    <div class="logo-dark">
                        <svg class="logo-lg h-6 w-auto" fill="currentColor" style="color:#1c1c1e" viewBox="0 0 897 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship Creative">
                            <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                            <path d="M897,75.94v7.05c-.84,5.43-2.21,10.69-5.09,15.55-9.02,15.22-27.97,21.19-44.14,13.84-3.39-1.54-5.91-3.68-8.77-6.57l-.03,40.18h-13.97s0-101,0-101l14.56-.09.17,9.39c13.22-15.82,37.09-13.34,49.41,1.79,4.76,5.85,6.78,12.67,7.87,19.86ZM882.53,79.51c0-12.29-9.97-22.26-22.26-22.26s-22.26,9.97-22.26,22.26,9.97,22.26,22.26,22.26,22.26-9.97,22.26-22.26Z"/>
                            <polygon points="495.58 45 510.7 44.96 486.68 114 472.35 114 453.91 64.88 435.22 115 420.91 115.04 397.37 44 412.73 44 428.55 93.93 446.68 45 461.38 45 479.25 93.88 495.58 45"/>
                            <path d="M766,114.01v-39.74c-.15-9.5-4.36-16.9-14.25-17.97-11.75-1.28-19.75,7.62-19.75,18.72l-.02,38.99-14.98.02V13s15,.04,15,.04l.05,40.18c8.4-9.65,19.85-11.65,31.24-8.26,12.51,4.18,17.63,15.56,17.71,28.27v40.77s-15,0-15,0Z"/>
                            <path d="M587,80c0,19.88-16.12,36-36,36s-36-16.12-36-36,16.12-36,36-36,36,16.12,36,36ZM566.09,94.79c8.13-9.06,7.65-22.86-.84-31.27-9.24-9.15-24.19-7.79-31.67,2.81-5.65,8.01-5.62,18.77.14,26.75,3.77,5.22,9.56,8.33,15.67,8.64s12.27-1.99,16.69-6.92Z"/>
                            <path d="M702.5,103.61c-7.85,12.82-25.14,14-38.26,10.07-7.32-2.49-13.25-7.23-17.06-14.14l13.28-6.93c3.78,6.4,10.11,10.11,17.5,10.11,3.13,0,6.15-.48,8.78-2.12,2.84-1.77,4.68-4.97,3.86-8.36-2.08-8.61-29.62-4.74-37.84-18.05-4.65-7.53-3.12-17.11,3.19-23.21,8.97-8.66,23.17-9.1,34.38-5.36,5.92,2.21,10.89,5.85,14.37,11.26l-12.28,6.78c-3.29-4.74-8.3-7.51-14.1-7.83-3.46-.19-6.88.18-9.79,2.05-2.72,1.74-4.47,5.09-3.11,8.21,3.42,7.81,31.33,4.52,38.33,19.05,2.88,5.97,2.23,12.82-1.23,18.48Z"/>
                            <path d="M333,80c0,19.88-16.12,36-36,36s-36-16.12-36-36,16.12-36,36-36,36,16.12,36,36ZM325.47,79.59c0-15.7-12.73-28.42-28.42-28.42s-28.42,12.73-28.42,28.42,12.73,28.42,28.42,28.42,28.42-12.73,28.42-28.42Z"/>
                            <path d="M640.02,59.05c-4.75.08-9.14-.08-13.65.24-5.66.41-10.21,3.81-11.87,9.19-.93,3.01-1.5,6.12-1.5,9.4l-.03,36.11h-14.97s0-69,0-69l14.81-.06.24,9.81c7.49-10.53,14.73-9.94,26.96-9.8l.02,14.1Z"/>
                            <path d="M236,114l-8,.07v-62.07s-12-.13-12-.13l.07-6.87,11.93-.03.18-11.7c.05-3.24.68-6.44,1.64-9.46,3.25-10.29,14.42-10.74,23.18-10.64v7.21s-14.71-.2-16.1,8.74c-.81,5.19-.67,10.35-.62,15.87h17.73v7l-18,.02v61.98Z"/>
                            <rect x="796" y="45" width="15" height="69"/>
                            <path d="M387,52.25c-3.92.05-7.25-.08-10.79.33-12.98,1.51-18.2,12.66-18.21,24.61l-.04,36.81-7.96-.05V45s8-.12,8-.12l.09,13.19c6.42-11.95,16.3-13.82,28.91-13.14v7.31Z"/>
                            <rect x="796" y="16" width="15" height="19"/>
                            <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                        </svg>
                        <svg class="logo-sm h-6 w-auto" fill="currentColor" style="color:#1c1c1e" viewBox="0 0 155 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship">
                            <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                            <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                        </svg>
                    </div>
                    <!-- Light Brand Logo (dark backgrounds) -->
                    <div class="logo-light">
                        <svg class="logo-lg h-6 w-auto" fill="currentColor" style="color:#f7f4ee" viewBox="0 0 897 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship Creative">
                            <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                            <path d="M897,75.94v7.05c-.84,5.43-2.21,10.69-5.09,15.55-9.02,15.22-27.97,21.19-44.14,13.84-3.39-1.54-5.91-3.68-8.77-6.57l-.03,40.18h-13.97s0-101,0-101l14.56-.09.17,9.39c13.22-15.82,37.09-13.34,49.41,1.79,4.76,5.85,6.78,12.67,7.87,19.86ZM882.53,79.51c0-12.29-9.97-22.26-22.26-22.26s-22.26,9.97-22.26,22.26,9.97,22.26,22.26,22.26,22.26-9.97,22.26-22.26Z"/>
                            <polygon points="495.58 45 510.7 44.96 486.68 114 472.35 114 453.91 64.88 435.22 115 420.91 115.04 397.37 44 412.73 44 428.55 93.93 446.68 45 461.38 45 479.25 93.88 495.58 45"/>
                            <path d="M766,114.01v-39.74c-.15-9.5-4.36-16.9-14.25-17.97-11.75-1.28-19.75,7.62-19.75,18.72l-.02,38.99-14.98.02V13s15,.04,15,.04l.05,40.18c8.4-9.65,19.85-11.65,31.24-8.26,12.51,4.18,17.63,15.56,17.71,28.27v40.77s-15,0-15,0Z"/>
                            <path d="M587,80c0,19.88-16.12,36-36,36s-36-16.12-36-36,16.12-36,36-36,36,16.12,36,36ZM566.09,94.79c8.13-9.06,7.65-22.86-.84-31.27-9.24-9.15-24.19-7.79-31.67,2.81-5.65,8.01-5.62,18.77.14,26.75,3.77,5.22,9.56,8.33,15.67,8.64s12.27-1.99,16.69-6.92Z"/>
                            <path d="M702.5,103.61c-7.85,12.82-25.14,14-38.26,10.07-7.32-2.49-13.25-7.23-17.06-14.14l13.28-6.93c3.78,6.4,10.11,10.11,17.5,10.11,3.13,0,6.15-.48,8.78-2.12,2.84-1.77,4.68-4.97,3.86-8.36-2.08-8.61-29.62-4.74-37.84-18.05-4.65-7.53-3.12-17.11,3.19-23.21,8.97-8.66,23.17-9.1,34.38-5.36,5.92,2.21,10.89,5.85,14.37,11.26l-12.28,6.78c-3.29-4.74-8.3-7.51-14.1-7.83-3.46-.19-6.88.18-9.79,2.05-2.72,1.74-4.47,5.09-3.11,8.21,3.42,7.81,31.33,4.52,38.33,19.05,2.88,5.97,2.23,12.82-1.23,18.48Z"/>
                            <path d="M333,80c0,19.88-16.12,36-36,36s-36-16.12-36-36,16.12-36,36-36,36,16.12,36,36ZM325.47,79.59c0-15.7-12.73-28.42-28.42-28.42s-28.42,12.73-28.42,28.42,12.73,28.42,28.42,28.42,28.42-12.73,28.42-28.42Z"/>
                            <path d="M640.02,59.05c-4.75.08-9.14-.08-13.65.24-5.66.41-10.21,3.81-11.87,9.19-.93,3.01-1.5,6.12-1.5,9.4l-.03,36.11h-14.97s0-69,0-69l14.81-.06.24,9.81c7.49-10.53,14.73-9.94,26.96-9.8l.02,14.1Z"/>
                            <path d="M236,114l-8,.07v-62.07s-12-.13-12-.13l.07-6.87,11.93-.03.18-11.7c.05-3.24.68-6.44,1.64-9.46,3.25-10.29,14.42-10.74,23.18-10.64v7.21s-14.71-.2-16.1,8.74c-.81,5.19-.67,10.35-.62,15.87h17.73v7l-18,.02v61.98Z"/>
                            <rect x="796" y="45" width="15" height="69"/>
                            <path d="M387,52.25c-3.92.05-7.25-.08-10.79.33-12.98,1.51-18.2,12.66-18.21,24.61l-.04,36.81-7.96-.05V45s8-.12,8-.12l.09,13.19c6.42-11.95,16.3-13.82,28.91-13.14v7.31Z"/>
                            <rect x="796" y="16" width="15" height="19"/>
                            <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                        </svg>
                        <svg class="logo-sm h-6 w-auto" fill="currentColor" style="color:#f7f4ee" viewBox="0 0 155 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship">
                            <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                            <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                        </svg>
                    </div>
                </a>
            </div>
            <!-- Sidenav Menu Toggle Button -->
            <button class="sidenav-toggle-button btn btn-icon" id="button-toggle-menu">
                <i class="iconify tabler--menu-4 text-xl"></i>
            </button>
            <!-- Topnav Menu Toggle Button for Horizontal -->
            <div class="topnav-toggle-button">
                <button aria-controls="topnav-menu" aria-expanded="false" aria-label="Toggle navigation" class="hs-collapse-toggle btn topnav-toggle-button" data-hs-collapse="#topnav-menu" id="topnav-menu-collapse" type="button">
                    <i class="iconify tabler--menu-4 text-xl"></i>
                </button>
            </div>
            <div class="hidden xl:flex" id="search-box">
                <div class="input-icon-group">
                    <i class="iconify tabler--search input-icon text-lg text-(--topbar-item-color)/50! placeholder:opacity-50"></i>
                    <input class="form-input w-57.5 border-(--topbar-search-border)! bg-(--topbar-search-bg)! text-(--topbar-item-color)! placeholder:opacity-50" id="topbar-search" placeholder="Search for something..." type="search" />
                </div>
            </div>
        </div>
        <div class="flex items-center gap-2.5">
            <!-- Light/Dark Mode Button -->
            <div class="sm:inline-flex hidden" id="theme-toggler">
                <div class="topbar-item">
                    <button class="topbar-link btn btn-icon size-8 rounded-full transition-[scale,background]" id="light-dark-mode" type="button">
                        <i class="iconify tabler--moon absolute scale-100 rotate-0 topbar-link-icon transition-all duration-200 dark:scale-0 dark:-rotate-90"></i>
                        <i class="iconify tabler--sun absolute scale-0 rotate-90 topbar-link-icon transition-all duration-200 dark:scale-100 dark:rotate-0"></i>
                    </button>
                </div>
            </div>
            <!-- Messages Dropdown -->
            <div class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]" id="simple-messages-dropdown">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle relative flex items-center" type="button">
                    <i class="iconify tabler--mail topbar-link-icon"></i>
                    @if ($topbarUnreadMessageCount > 0)
                        <span class="badge bg-success absolute -end-px -top-[13px] size-4 rounded-full leading-0 text-white" id="topbar-message-badge">{{ $topbarUnreadMessageCount }}</span>
                    @endif
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu">
                    <div class="border-default-300 border-b px-6 py-3">
                        <div class="flex items-center justify-between">
                            <h6 class="text-base font-semibold">Messages</h6>
                            @if ($topbarUnreadMessageCount > 0)
                                <span class="badge badge-label bg-success/15 text-success">{{ $topbarUnreadMessageCount }} unread</span>
                            @endif
                        </div>
                    </div>
                    <div data-simplebar="" style="max-height: 300px">
                        @forelse ($topbarConversations as $convo)
                            <a class="dropdown-item {{ $convo['unread'] ? 'active' : '' }} flex items-start gap-3 px-4.5 py-3 text-wrap" href="{{ $convo['url'] }}">
                                <span class="bg-primary/15 text-primary flex size-9 shrink-0 items-center justify-center rounded-full">
                                    <i class="iconify tabler--message-circle text-lg"></i>
                                </span>
                                <span class="grow min-w-0">
                                    <span class="text-body-color block truncate font-medium">{{ $convo['title'] }}</span>
                                    @if ($convo['preview'])
                                        <span class="text-default-400 block truncate text-xs">{{ $convo['preview'] }}</span>
                                    @endif
                                    <span class="text-default-400 text-xs">{{ $convo['last_active']->diffForHumans() }}</span>
                                </span>
                            </a>
                        @empty
                            <div class="px-4.5 py-8 text-center">
                                <i class="iconify tabler--mail text-default-300 mb-2 text-2xl"></i>
                                <p class="text-default-400 text-sm">No conversations yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Alerts Dropdown -->
            <div class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]" id="notification-dropdown-alert">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle relative flex items-center" type="button">
                    <i class="iconify tabler--bell topbar-link-icon"></i>
                    @if ($topbarUnreadAlertCount > 0)
                        <span class="badge bg-warning absolute -end-px -top-[13px] size-4 rounded text-white">{{ $topbarUnreadAlertCount }}</span>
                    @endif
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu">
                    <div class="border-default-300 border-b px-3 py-2">
                        <div class="flex items-center justify-between">
                            <h6 class="text-base font-semibold">Alerts</h6>
                            @if ($topbarUnreadAlertCount > 0)
                                <span class="badge badge-label bg-warning/15 text-warning">{{ $topbarUnreadAlertCount }} unread</span>
                            @endif
                        </div>
                    </div>
                    <div data-simplebar="" style="max-height: 300px">
                        @forelse ($topbarAlerts as $alert)
                            <a class="dropdown-item flex items-start gap-3 px-4.5 py-3 text-wrap" href="{{ $alert->action_url }}">
                                <span class="shrink-0">
                                    <span class="{{ $alert->colorClass() }} flex size-9 items-center justify-center rounded">
                                        <i class="iconify {{ $alert->iconClass() }} text-lg"></i>
                                    </span>
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color block font-medium">{{ $alert->title }}</span>
                                    @if ($alert->body)
                                        <span class="block text-xs">{{ $alert->body }}</span>
                                    @endif
                                    <span class="text-xs">{{ $alert->created_at->diffForHumans() }}</span>
                                </span>
                            </a>
                        @empty
                            <div class="px-4.5 py-8 text-center">
                                <i class="iconify tabler--bell text-default-300 mb-2 text-2xl"></i>
                                <p class="text-default-400 text-sm">No alerts right now.</p>
                            </div>
                        @endforelse
                    </div>
                    @if ($topbarAlerts->isNotEmpty())
                        <a class="dropdown-item text-reset border-light justify-center border-t py-3 font-bold underline underline-offset-2" href="{{ route('tasks.index') }}">View all alerts</a>
                    @endif
                </div>
            </div>
            <!-- Fullscreen Toggle -->
            <div class="md:inline-flex hidden" id="fullscreen-toggler">
                <div class="topbar-item">
                    <button aria-label="Full Screen" class="topbar-link btn group size-8 rounded-full" data-toggle="fullscreen">
                        <i class="iconify tabler--maximize topbar-link-icon group-[.fullscreen-active]:hidden"></i>
                        <i class="iconify tabler--minimize hidden topbar-link-icon group-[.fullscreen-active]:inline-block"></i>
                    </button>
                </div>
            </div>
<!-- Profile Dropdown -->
            <div class="topbar-item hs-dropdown before:bg-default-700/35 relative inline-flex before:h-4.5 before:w-px before:content-['']" id="simple-user-dropdown">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle topbar-link ms-2.5 cursor-pointer items-center px-3! flex">
                    <img alt="{{ auth()->user()->name }}" class="size-8 rounded-full object-cover lg:me-3" src="{{ $currentAvatarUrl }}" />
                    <div class="hidden lg:flex items-center gap-1.5">
                        <h5 class="pro-username">{{ auth()->user()->name }}</h5>
                        <i class="iconify tabler--chevron-down align-middle"></i>
                    </div>
                </button>
                <div aria-labelledby="hs-dropdown-with-icons" aria-orientation="vertical" class="hs-dropdown-menu min-w-48" role="menu">
                    <div class="py-2 px-3.5">
                        <h6 class="text-xs">Welcome back!</h6>
                    </div>
                    <a class="dropdown-item" href="{{ route("profile.edit") }}">
                        <i class="iconify tabler--user-circle text-base align-middle"></i>
                        <span class="align-middle">Profile &amp; Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route("password.confirm") }}">
                        <i class="iconify tabler--lock text-base align-middle"></i>
                        <span class="align-middle">Lock Screen</span>
                    </a>
                    <form action="{{ route("logout") }}" method="POST">
                        @csrf
                        <button class="dropdown-item w-full font-semibold text-danger" type="submit">
                            <i class="iconify tabler--logout text-base align-middle"></i>
                            <span class="align-middle">Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->
<script>
(function () {
    var dropdown = document.getElementById('simple-messages-dropdown');
    var badge = document.getElementById('topbar-message-badge');
    if (!dropdown || !badge) return;

    var toggle = dropdown.querySelector('.hs-dropdown-toggle');
    if (!toggle) return;

    var marked = false;
    toggle.addEventListener('click', function () {
        if (marked || toggle.getAttribute('aria-expanded') !== 'false') return;
        marked = true;
        badge.remove();
        fetch('{{ route('topbar.conversations.read') }}', {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });
    });
}());
</script>
