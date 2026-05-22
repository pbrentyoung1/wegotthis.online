<header class="app-header">
    <div class="container-fluid flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="logo-topbar">
                <!-- Sidenav Menu Brand Logo -->
                <a class="logo-box" href="{{ url("/") }}">
                    <!-- Light Brand Logo -->
                    <div class="logo-light">
                        <img alt="Light logo" class="logo-lg h-6" src="/images/logo.png" />
                        <img alt="Small logo" class="logo-sm h-6" src="/images/logo-sm.png" />
                    </div>
                    <!-- Dark Brand Logo -->
                    <div class="logo-dark">
                        <img alt="Dark logo" class="logo-lg h-6" src="/images/logo-black.png" />
                        <img alt="Small logo" class="logo-sm h-6" src="/images/logo-sm.png" />
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
            <div class="md:inline-flex hidden" id="megamenu-header">
                <div class="topbar-item hs-dropdown relative inline-flex">
                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle btn px-2.5! font-medium" type="button">
                        Mega Menu
                        <i class="iconify tabler--chevron-down"></i>
                    </button>
                    <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu p-0 md:min-w-3xl" role="menu">
                        <div data-simplebar="" style="max-height: 380px">
                            <div class="bg-light/50 px-6 py-3 text-center">
                                <h4 class="text-base font-semibold">
                                    Welcome to
                                    <span class="text-primary">Inspinia</span>
                                    Admin Theme.
                                </h4>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div class="p-6">
                                    <h5 class="py-2 px-3.5 font-semibold mb-2 text-sm">Dashboard &amp; Analytics</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Sales Dashboard</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Marketing Dashboard</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Finance Overview</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">User Analytics</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Traffic Insights</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-6">
                                    <h5 class="py-2 px-3.5 font-semibold mb-2 text-sm">Project Management</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Task Overview</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Kanban Board</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Gantt Chart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Team Collaboration</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Project Milestones</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-6">
                                    <h5 class="py-2 px-3.5 font-semibold mb-2 text-sm">User Management</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">User Profiles</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Access Control</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Role Permissions</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Activity Logs</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">Security Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        <!-- end .h-100-->
                    </div>
                </div>
            </div>
            <div class="md:inline-flex hidden" id="megamenu-apps">
                <div class="topbar-item hs-dropdown relative inline-flex">
                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle btn px-2.5! font-medium" type="button">Apps <i class="iconify tabler--chevron-down"></i></button>
                    <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu p-0 md:min-w-3xl" role="menu">
                        <div data-simplebar="" style="max-height: 380px">
                            <div class="grid md:grid-cols-3">
                                <div class="p-3 space-y-2">
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-primary border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--basket size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">eCommerce</h5>
                                                <span class="text-default-400 text-xs">Products, orders &amp; etc.</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-success border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--message size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Chat</h5>
                                                <span class="text-default-400 text-xs">Team conversations</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-danger border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--list-check size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Task</h5>
                                                <span class="text-default-400 text-xs">Plan and track work</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-info border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--mailbox size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Email</h5>
                                                <span class="text-default-400 text-xs">Messages and inbox</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="p-3 space-y-2">
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-secondary border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--building size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Companies</h5>
                                                <span class="text-default-400 text-xs">Business profiles</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-dark border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--id size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Contacts Diary</h5>
                                                <span class="text-default-400 text-xs">People and connections</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-warning border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--calendar size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Calendar</h5>
                                                <span class="text-default-400 text-xs">Events and reminders</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <span class="flex items-center gap-3">
                                            <span class="size-9 flex items-center justify-center text-success border border-light bg-light/50 rounded">
                                                <i class="iconify tabler--lifebuoy size-5.5"></i>
                                            </span>
                                            <span>
                                                <h5 class="text-xs">Support</h5>
                                                <span class="text-default-400 text-xs">Help and assistance</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="row-span-2 bg-light/50">
                                    <div class="h-full relative rounded-e overflow-hidden bg-[url(/images/stock/small-8.jpg)] bg-cover">
                                        <div class="p-6 absolute inset-0 bg-gradient bg-secondary/90 flex items-center justify-center">
                                            <div class="text-center text-white">
                                                <i class="iconify tabler--atom text-4xl"></i>
                                                <p class="text-white/75 mb-5 uppercase">Limited Offer</p>
                                                <h3 class="font-semibold text-white mb-3 text-xl">Unlock Exclusive Savings</h3>
                                                <h4 class="font-medium text-base mb-1">
                                                    <del class="text-opacity-75 text-white">$49.00</del>
                                                    /
                                                    <span class="font-bold text-white">$25 USD</span>
                                                </h4>
                                                <button class="mt-5 btn btn-sm bg-danger text-white hover:bg-danger-hover" type="button">
                                                    <i class="iconify tabler--shopping-cart me-1.5"></i>
                                                    Buy Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end .bg-light-->
                                </div>
                                <div class="col-span-2">
                                    <div class="grid grid-cols-2 border-t border-light border-dashed text-center">
                                        <div class="p-6">
                                            <p class="font-medium text-default-400 mb-1 text-2xs uppercase">-:   Support  :-</p>
                                            <h5 class="text-md">help@mydomain.com</h5>
                                        </div>
                                        <div class="p-6">
                                            <p class="font-medium text-default-400 mb-1 text-2xs uppercase">-:   Help:  :-</p>
                                            <h5 class="text-md">+(12) 3456 7890</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                    </div>
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
            <!-- Light/Dark Mode Dropdown -->
            <div class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]" id="apps-dropdown-rounded">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle relative flex items-center" type="button">
                    <i class="iconify tabler--apps topbar-link-icon"></i>
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu w-80 p-3" role="menu">
                    <div class="grid grid-cols-3 items-center gap-1.5">
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full bg-light flex items-center justify-center mx-auto mb-1.25">
                                <img alt="Google Logo" class="h-4.5" src="/images/logos/google.svg" />
                            </span>
                            <span class="align-middle font-medium">Google</span>
                        </a>
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full bg-light flex items-center justify-center mx-auto mb-1.25">
                                <img alt="Figma Logo" class="h-4.5" src="/images/logos/figma.svg" />
                            </span>
                            <span class="align-middle font-medium">Figma</span>
                        </a>
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full bg-light flex items-center justify-center mx-auto mb-1.25">
                                <img alt="Slack Logo" class="h-4.5" src="/images/logos/slack.svg" />
                            </span>
                            <span class="align-middle font-medium">Slack</span>
                        </a>
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full bg-light flex items-center justify-center mx-auto mb-1.25">
                                <img alt="Dropbox Logo" class="h-4.5" src="/images/logos/dropbox.svg" />
                            </span>
                            <span class="align-middle font-medium">Dropbox</span>
                        </a>
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full flex items-center justify-center bg-primary/15 text-primary mx-auto mb-1.25">
                                <i class="iconify tabler--calendar text-lg"></i>
                            </span>
                            <span class="align-middle font-medium">Calendar</span>
                        </a>
                        <a class="dropdown-item flex-col gap-0 text-center py-3" href="javascript:void(0);">
                            <span class="size-8 rounded-full flex items-center justify-center bg-primary/15 text-primary mx-auto mb-1.25">
                                <i class="iconify tabler--message-circle text-lg"></i>
                            </span>
                            <span class="align-middle font-medium">Chat</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]" id="simple-messages-dropdown">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle relative flex items-center" type="button">
                    <i class="iconify tabler--mail topbar-link-icon"></i>
                    <span class="badge bg-success absolute -end-px -top-[13px] size-4 rounded-full leading-0 text-white">7</span>
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu">
                    <div class="border-default-300 border-b px-6 py-3">
                        <div class="flex items-center justify-between">
                            <h6 class="text-base font-semibold">Messages</h6>
                            <a class="badge badge-label bg-success/15 text-success" href="#!">09 Notifications</a>
                        </div>
                    </div>
                    <div data-simplebar="" style="max-height: 300px">
                        <!-- item 1 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item active px-4.5 py-3 text-wrap" id="message-1">
                            <span class="flex gap-base">
                                <span class="shrink-0">
                                    <img alt="User Avatar" class="size-9 rounded-full" src="/images/users/user-1.jpg" />
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Liam Carter</span>
                                    uploaded a new document to
                                    <span class="text-body-color font-medium">Project Phoenix</span>
                                    <br />
                                    <span class="text-xs">5 minutes ago</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-1" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                        <!-- item 2 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item px-4.5 py-3 text-wrap" id="message-2">
                            <span class="flex gap-base">
                                <span class="shrink-0">
                                    <img alt="User Avatar" class="size-9 rounded-full" src="/images/users/user-2.jpg" />
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Ava Mitchell</span>
                                    commented on
                                    <span class="text-body-color font-medium">Marketing Campaign Q3</span>
                                    <br />
                                    <span class="text-xs">12 minutes ago</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-2" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                        <!-- item 3 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item px-4.5 py-3 text-wrap" id="message-3">
                            <span class="flex gap-base">
                                <span class="bg-info flex size-9 shrink-0 items-center justify-center rounded-full text-white">
                                    <i class="iconify tabler--user-hexagon text-xl"></i>
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Noah Blake</span>
                                    updated the status of
                                    <span class="text-body-color font-medium">Client Onboarding</span>
                                    <br />
                                    <span class="text-xs">30 minutes ago</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-3" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                        <!-- item 4 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item px-4.5 py-3 text-wrap" id="message-4">
                            <span class="flex gap-base">
                                <span class="shrink-0">
                                    <img alt="User Avatar" class="size-9 rounded-full" src="/images/users/user-4.jpg" />
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Sophia Taylor</span>
                                    sent an invoice for
                                    <span class="text-body-color font-medium">Service Renewal</span>
                                    <br />
                                    <span class="text-xs">1 hour ago</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-4" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                        <!-- item 5 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item px-4.5 py-3 text-wrap" id="message-5">
                            <span class="flex gap-base">
                                <span class="shrink-0">
                                    <img alt="User Avatar" class="size-9 rounded-full" src="/images/users/user-5.jpg" />
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Ethan Moore</span>
                                    completed the task
                                    <span class="text-body-color font-medium">UI Review</span>
                                    <br />
                                    <span class="text-xs">2 hours ago</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-5" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                        <!-- item 6 -->
                        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 dropdown-item px-4.5 py-3 text-wrap" id="message-6">
                            <span class="flex gap-base">
                                <span class="shrink-0">
                                    <img alt="User Avatar" class="size-9 rounded-full" src="/images/users/user-6.jpg" />
                                </span>
                                <span class="text-default-400 grow">
                                    <span class="text-body-color font-medium">Olivia White</span>
                                    assigned you a task in
                                    <span class="text-body-color font-medium">Sales Pipeline</span>
                                    <br />
                                    <span class="text-xs">Yesterday</span>
                                </span>
                                <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#message-6" type="button">
                                    <i class="iconify tabler--square-rounded-x text-xl"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <!-- All-->
                    <a class="dropdown-item text-reset notify-item border-light justify-center border-t py-3 text-center font-bold underline underline-offset-2" href="javascript:void(0);">Read All Messages</a>
                </div>
            </div>
            <div class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]" id="notification-dropdown-alert">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle relative flex items-center" type="button">
                    <i class="iconify tabler--bell topbar-link-icon"></i>
                    <span class="badge bg-warning absolute -end-px -top-[13px] size-4 rounded text-white">12</span>
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu">
                    <div class="border-default-300 border-b px-3 py-2">
                        <div class="flex items-center justify-between">
                            <h6 class="text-base font-semibold">Notifications</h6>
                            <a class="badge badge-label bg-light text-dark" href="#!">12 Alerts</a>
                        </div>
                    </div>
                    <div data-simplebar="" style="max-height: 300px">
                        <!-- item 1 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-1">
                            <span class="shrink-0">
                                <span class="bg-danger/15 text-danger flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--server-bolt text-lg fill-danger"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Critical alert: Server crash detected</span>
                                <br />
                                <span class="text-xs">30 minutes ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-1" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 2 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-2">
                            <span class="shrink-0">
                                <span class="bg-warning/15 text-warning flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--alert-triangle text-lg fill-warning"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">High memory usage on Node A</span>
                                <br />
                                <span class="text-xs">10 minutes ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-2" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 3 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-3">
                            <span class="shrink-0">
                                <span class="bg-success/15 text-success flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--circle-check text-lg fill-success"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Backup completed successfully</span>
                                <br />
                                <span class="text-xs">1 hour ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-3" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 4 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-4">
                            <span class="shrink-0">
                                <span class="bg-primary/15 text-primary flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--user-plus text-lg fill-primary"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">New user registration: Sarah Miles</span>
                                <br />
                                <span class="text-xs">Just now</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-4" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 5 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-5">
                            <span class="shrink-0">
                                <span class="bg-danger/15 text-danger flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--bug text-lg fill-danger"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Bug reported in payment module</span>
                                <br />
                                <span class="text-xs">20 minutes ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-5" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 6 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-6">
                            <span class="shrink-0">
                                <span class="bg-info/15 text-info flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--message-circle text-lg fill-info"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">New comment on Task #142</span>
                                <br />
                                <span class="text-xs">15 minutes ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-6" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 7 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-7">
                            <span class="shrink-0">
                                <span class="bg-warning/15 text-warning flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--battery-charging text-lg fill-warning"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Low battery on Device X</span>
                                <br />
                                <span class="text-xs">45 minutes ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-7" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 8 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-8">
                            <span class="shrink-0">
                                <span class="bg-success/15 text-success flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--cloud-upload text-lg fill-success"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">File upload completed</span>
                                <br />
                                <span class="text-xs">1 hour ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-8" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 9 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-9">
                            <span class="shrink-0">
                                <span class="bg-primary/15 text-primary flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--calendar text-lg fill-primary"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Team meeting scheduled at 3 PM</span>
                                <br />
                                <span class="text-xs">2 hours ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-9" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 10 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-10">
                            <span class="shrink-0">
                                <span class="bg-secondary/15 text-secondary flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--download text-lg fill-secondary"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Report ready for download</span>
                                <br />
                                <span class="text-xs">3 hours ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-10" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 11 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-11">
                            <span class="shrink-0">
                                <span class="bg-danger/15 text-danger flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--lock text-lg fill-danger"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Multiple failed login attempts</span>
                                <br />
                                <span class="text-xs">5 hours ago</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-11" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                        <!-- item 12 -->
                        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" id="notification-12">
                            <span class="shrink-0">
                                <span class="bg-info/15 text-info flex size-9 items-center justify-center rounded">
                                    <i class="iconify tabler--bell-ringing text-lg fill-info"></i>
                                </span>
                            </span>
                            <span class="text-default-400 grow">
                                <span class="font-medium text-body-color">Reminder: Submit your timesheet</span>
                                <br />
                                <span class="text-xs">Today, 9:00 AM</span>
                            </span>
                            <button class="text-default-400 btn btn-link shrink-0 p-0" data-hs-remove-element="#notification-12" type="button">
                                <i class="iconify tabler--square-rounded-x text-xl"></i>
                            </button>
                        </div>
                    </div>
                    <!-- end dropdown-->
                    <!-- All-->
                    <a class="dropdown-item text-reset border-light justify-center border-t py-3 font-bold underline underline-offset-2" href="javascript:void(0);">View All Alerts</a>
                </div>
            </div>
            <!-- FullScreen Toggle -->
            <div class="md:inline-flex hidden" id="fullscreen-toggler">
                <div class="topbar-item">
                    <button aria-label="Full Screen" class="topbar-link btn group size-8 rounded-full" data-toggle="fullscreen">
                        <i class="iconify tabler--maximize topbar-link-icon group-[.fullscreen-active]:hidden"></i>
                        <i class="iconify tabler--minimize hidden topbar-link-icon group-[.fullscreen-active]:inline-block"></i>
                    </button>
                </div>
            </div>
            <!-- Monochrome Mode Button -->
            <div class="xl:inline-flex hidden">
                <div class="topbar-item" id="monochrome-toggler">
                    <button aria-label="Monochrome Mode" class="topbar-link btn btn-sm size-8 rounded-full" id="monochrome-mode" type="button">
                        <i class="iconify tabler--palette topbar-link-icon"></i>
                    </button>
                </div>
            </div>
            <!-- Setting Offcanvas Button -->
            <div class="sm:inline-flex hidden">
                <div class="topbar-item btn-theme-setting">
                    <button aria-controls="theme-customization" aria-expanded="false" aria-haspopup="dialog" class="topbar-link btn btn-icon size-8 rounded-full" data-hs-overlay="#theme-customization" type="button">
                        <i class="iconify tabler--settings topbar-link-icon"></i>
                    </button>
                </div>
            </div>
            <!-- Language Dropdown Button -->
            <div class="topbar-item hs-dropdown relative sm:inline-flex hidden [--placement:bottom-right]" id="language-selector">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="topbar-link hs-dropdown-toggle font-bold relative flex items-center" type="button">
                    <img alt="" class="me-3 size-4.5 rounded" id="selected-language-image" src="/images/flags/us.svg" />
                    <span id="selected-language-code">EN</span>
                </button>
                <div aria-labelledby="dropdown-menu" aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                    <a class="dropdown-item" data-translator-lang="en" href="javascript:void(0);" title="English">
                        <img alt="English" class="me-1 size-4 rounded" data-translator-image="" height="18" src="/images/flags/us.svg" />
                        <span class="align-middle">English</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="de" href="javascript:void(0);" title="German">
                        <img alt="German" class="me-1 size-4 rounded" data-translator-image="" height="18" src="/images/flags/de.svg" />
                        <span class="align-middle">Deutsch</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="it" href="javascript:void(0);" title="Italian">
                        <img alt="Italian" class="me-1 size-4 rounded" data-translator-image="" height="18" src="/images/flags/it.svg" />
                        <span class="align-middle">Italiano</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="es" href="javascript:void(0);" title="Spanish">
                        <img alt="Spanish" class="me-1 size-4 rounded" data-translator-image="" height="18" src="/images/flags/es.svg" />
                        <span class="align-middle">Español</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="ru" href="javascript:void(0);" title="Russian">
                        <img alt="Russian" class="me-1 size-4 rounded" data-translator-image="" height="18" src="/images/flags/ru.svg" />
                        <span class="align-middle">Русский</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="hi" href="javascript:void(0);" title="Hindi">
                        <img alt="Hindi" class="me-1 size-4 rounded" data-translator-image="" src="/images/flags/in.svg" />
                        <span class="align-middle">हिन्दी</span>
                    </a>
                    <a class="dropdown-item" data-translator-lang="ar" href="javascript:void(0);" title="Arabic">
                        <img alt="Arabic" class="me-1 size-4 rounded" data-translator-image="" src="/images/flags/sa.svg" />
                        <span class="align-middle">عربي</span>
                    </a>
                </div>
            </div>
            <!-- Profile Dropdown Button -->
            <!-- Profile Dropdown Button -->
            <div class="topbar-item hs-dropdown before:bg-default-700/35 relative inline-flex before:h-4.5 before:w-px before:content-['']" id="simple-user-dropdown">
                <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle topbar-link ms-2.5 cursor-pointer items-center px-3! flex">
                    <img alt="user-image" class="size-8 rounded-full lg:me-3" src="/images/users/user-1.jpg" />
                    <div class="hidden lg:flex items-center gap-1.5">
                        <h5 class="pro-username">Damian D.</h5>
                        <i class="iconify tabler--chevron-down align-middle"></i>
                    </div>
                </button>
                <div aria-labelledby="hs-dropdown-with-icons" aria-orientation="vertical" class="hs-dropdown-menu min-w-48" role="menu">
                    <!-- Header -->
                    <div class="py-2 px-3.5">
                        <h6 class="text-xs">Welcome back 👋!</h6>
                    </div>
                    <!-- My Profile -->
                    <a class="dropdown-item" href="#!">
                        <i class="iconify tabler--user-circle text-base align-middle"></i>
                        <span class="align-middle">Profile</span>
                    </a>
                    <!-- Notifications -->
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="iconify tabler--bell-ringing text-base align-middle"></i>
                        <span class="align-middle">Notifications</span>
                    </a>
                    <!-- Wallet -->
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="iconify tabler--credit-card me-1.5 text-base align-middle"></i>
                        <span class="align-middle"> Balance: <span class="font-semibold">$985.25</span> </span>
                    </a>
                    <!-- Settings -->
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="iconify tabler--settings-2 text-base align-middle"></i>
                        <span class="align-middle">Account Settings</span>
                    </a>
                    <!-- Support -->
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="iconify tabler--headset text-base align-middle"></i>
                        <span class="align-middle">Support Center</span>
                    </a>
                    <!-- Divider -->
                    <div class="dropdown-divider"></div>
                    <!-- Lock -->
                    <a class="dropdown-item" href="{{ url("/auth/lock-screen") }}">
                        <i class="iconify tabler--lock text-base align-middle"></i>
                        <span class="align-middle">Lock Screen</span>
                    </a>
                    <!-- Logout -->
                    <a class="dropdown-item font-semibold text-danger" href="javascript:void(0);">
                        <i class="iconify tabler--logout text-base align-middle"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->
