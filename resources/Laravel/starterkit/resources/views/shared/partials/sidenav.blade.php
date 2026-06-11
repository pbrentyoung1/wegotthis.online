@php($currentAvatarUrl = auth()->user()->profiles()->where("status", "Active")->orderBy("id")->value("avatar_url") ?: "/images/users/user-1.jpg")
<aside class="app-menu" id="app-menu">
    <!-- Sidenav Menu Brand Logo -->
    <a class="logo-box" href="{{ url("/") }}">
        <!-- Dark Brand Logo (light backgrounds) -->
        <span class="logo logo-dark">
            <span class="logo-lg overflow-hidden text-[#1c1c1e]">
                <svg class="h-7 max-w-full" fill="currentColor" viewBox="0 0 897 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship Creative">
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
            </span>
            <span class="logo-sm flex text-[#1c1c1e]">
                <svg class="h-7 w-auto" fill="currentColor" viewBox="0 0 155 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship">
                    <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                    <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                </svg>
            </span>
        </span>
        <!-- Light Brand Logo (dark backgrounds) -->
        <span class="logo logo-light">
            <span class="logo-lg overflow-hidden text-[#f7f4ee]">
                <svg class="h-7 max-w-full" fill="currentColor" viewBox="0 0 897 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship Creative">
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
            </span>
            <span class="logo-sm flex text-[#f7f4ee]">
                <svg class="h-7 w-auto" fill="currentColor" viewBox="0 0 155 159" xmlns="http://www.w3.org/2000/svg" aria-label="ForWorship">
                    <path d="M81.75,0c26.54,2.56,50,18.25,61.69,41.76,13.03,26.19,10.03,56.63-7.1,79.62l5.9,33.47c.35,1.99-1.31,3.09-2.45,4.15h-2.55l-33.92-12.5c-23.51,9.02-49.37,6.22-70.42-8.1C14.21,125.68,2.2,104.73,0,81.75v-12C3.78,32.19,32.19,3.73,69.75,0h12ZM138.28,75.7c0-34.34-27.84-62.18-62.18-62.18S13.93,41.36,13.93,75.7s27.84,62.18,62.18,62.18,62.18-27.84,62.18-62.18Z"/>
                    <path d="M112.18,79.73l-49.5,28.35c-1.35.77-3.02.64-4.38-.05-.99-.5-2.3-1.92-2.3-3.57v-57.32c0-1.54,1.18-2.9,2.07-3.43,1.4-.83,3.15-1.02,4.61-.19l49.5,28.35c1.53.88,2.28,2.42,2.28,3.93s-.75,3.05-2.28,3.93Z"/>
                </svg>
            </span>
        </span>
    </a>
    <!-- Sidenav Menu Toggle Button -->
    <div class="h-topbar justify absolute end-5 top-0 flex items-center">
        <button id="button-hover-toggle">
            <span class="btn-on-hover-icon"></span>
        </button>
    </div>
    <!-- Sidenav Menu Item Link -->
    <div class="relative min-h-0 grow">
        <div class="size-full" data-simplebar="">
            <div class="sidenav-user p-5 bg-[url(/images/user-bg-pattern.svg)]" id="user-profile-settings">
                <div class="flex items-center justify-between">
                    <div>
                        <a class="link-reset" href="{{ route("profile.edit") }}">
                            <img alt="{{ auth()->user()->name }}" class="mb-3 size-9 rounded-full object-cover" src="{{ $currentAvatarUrl }}" />
                            <span class="sidenav-user-name block font-bold text-nowrap">{{ auth()->user()->name }}</span>
                            <span class="text-xs font-semibold" data-lang="user-role">Your workspace</span>
                        </a>
                    </div>
                    <div>
                        <!-- Profile Dropdown Button -->
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="cursor-pointer">
                                <i class="iconify tabler--settings ms-1 size-6 align-middle"></i>
                            </button>
                            <div aria-labelledby="hs-dropdown-with-icons" aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                <!-- Header -->
                                <div class="py-2 px-3.5">
                                    <h6 class="text-xs">Welcome back 👋!</h6>
                                </div>
                                <!-- My Profile -->
                                <a class="dropdown-item" href="{{ route("profile.edit") }}">
                                    <i class="iconify tabler--user-circle me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Profile</span>
                                </a>
                                <!-- Settings -->
                                <a class="dropdown-item" href="{{ route("profile.edit") }}">
                                    <i class="iconify tabler--settings-2 me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Account Settings</span>
                                </a>
                                <!-- Lock -->
                                <a class="dropdown-item" href="{{ route("password.confirm") }}">
                                    <i class="iconify tabler--lock me-1 align-middle text-lg"></i>
                                    <span class="align-middle">Lock Screen</span>
                                </a>
                                <!-- Logout -->
                                <form action="{{ route("logout") }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item w-full text-start text-danger" type="submit">
                                        <i class="iconify tabler--logout me-1 align-middle text-lg"></i>
                                        <span class="align-middle">Log Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidenav-menu">
                <ul class="side-nav hs-accordion-group px-2.5 pb-16.5">
                    <li class="menu-title" data-lang="main">
                        <span>Main</span>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url("/") }}">
                            <span class="menu-icon"><i class="iconify tabler--dashboard"></i></span>
                            <span class="menu-text" data-lang="dashboard-projects">Projects</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route("people.index") }}">
                            <span class="menu-icon"><i class="iconify tabler--users"></i></span>
                            <span class="menu-text">People</span>
                        </a>
                    </li>
                    <li class="menu-title">
                        <span>Base UI</span>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="base-ui" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--palette"></i></span>
                            <span class="menu-text">UI Demo</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden" id="base-ui">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/ui/typography") }}">
                                    <span class="menu-text">Typography</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/ui/colors") }}">
                                    <span class="menu-text">Colors</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/ui/buttons") }}">
                                    <span class="menu-text">Buttons</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/ui/forms") }}">
                                    <span class="menu-text">Forms</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/ui/cards") }}">
                                    <span class="menu-text">Cards</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-title" data-lang="custom-pages">
                        <span>Custom Pages</span>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url("/pages/empty") }}">
                            <span class="menu-icon"><i class="iconify tabler--files"></i></span>
                            <span class="menu-text" data-lang="pages-empty">Empty Page</span>
                        </a>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="authentication" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--password-user"></i></span>
                            <span class="menu-text" data-lang="authentication">Authentication</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item hs-accordion">
                                <a aria-controls="auth-basic" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                    <span class="menu-text" data-lang="auth-basic">Basic</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/sign-in") }}">
                                            <span class="menu-text" data-lang="auth-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/sign-up") }}">
                                            <span class="menu-text" data-lang="auth-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/reset-pass") }}">
                                            <span class="menu-text" data-lang="auth-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/new-pass") }}">
                                            <span class="menu-text" data-lang="auth-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/two-factor") }}">
                                            <span class="menu-text" data-lang="auth-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/lock-screen") }}">
                                            <span class="menu-text" data-lang="auth-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/success-mail") }}">
                                            <span class="menu-text" data-lang="auth-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/login-pin") }}">
                                            <span class="menu-text" data-lang="auth-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth/delete-account") }}">
                                            <span class="menu-text" data-lang="auth-delete-account">Delete Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item hs-accordion">
                                <a aria-controls="auth-card" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                    <span class="menu-text" data-lang="auth-card">Card</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/sign-in") }}">
                                            <span class="menu-text" data-lang="auth-card-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/sign-up") }}">
                                            <span class="menu-text" data-lang="auth-card-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/reset-pass") }}">
                                            <span class="menu-text" data-lang="auth-card-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/new-pass") }}">
                                            <span class="menu-text" data-lang="auth-card-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/two-factor") }}">
                                            <span class="menu-text" data-lang="auth-card-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/lock-screen") }}">
                                            <span class="menu-text" data-lang="auth-card-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/success-mail") }}">
                                            <span class="menu-text" data-lang="auth-card-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/login-pin") }}">
                                            <span class="menu-text" data-lang="auth-card-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-card/delete-account") }}">
                                            <span class="menu-text" data-lang="auth-card-delete-account">Delete Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item hs-accordion">
                                <a aria-controls="auth-split" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                    <span class="menu-text" data-lang="auth-split">Split</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/sign-in") }}">
                                            <span class="menu-text" data-lang="auth-split-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/sign-up") }}">
                                            <span class="menu-text" data-lang="auth-split-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/reset-pass") }}">
                                            <span class="menu-text" data-lang="auth-split-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/new-pass") }}">
                                            <span class="menu-text" data-lang="auth-split-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/two-factor") }}">
                                            <span class="menu-text" data-lang="auth-split-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/lock-screen") }}">
                                            <span class="menu-text" data-lang="auth-split-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/success-mail") }}">
                                            <span class="menu-text" data-lang="auth-split-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/login-pin") }}">
                                            <span class="menu-text" data-lang="auth-split-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url("/auth-split/delete-account") }}">
                                            <span class="menu-text" data-lang="auth-split-delete-account">Delete Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="error-pages" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--alert-triangle"></i></span>
                            <span class="menu-text" data-lang="error-pages">Error Pages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/400") }}">
                                    <span class="menu-text" data-lang="error-400">400 Bad Request</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/401") }}">
                                    <span class="menu-text" data-lang="error-401">401 Unauthorized</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/403") }}">
                                    <span class="menu-text" data-lang="error-403">403 Forbidden</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/404") }}">
                                    <span class="menu-text" data-lang="error-404">404 Not Found</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/408") }}">
                                    <span class="menu-text" data-lang="error-408">408 Request Timeout</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/500") }}">
                                    <span class="menu-text" data-lang="error-500">500 Internal Server</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/error/maintenance") }}">
                                    <span class="menu-text" data-lang="error-maintenance">Maintenance</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-title" data-lang="layouts">
                        <span>Layouts</span>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="layout-options" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--layout"></i></span>
                            <span class="menu-text" data-lang="layout-options">Layout Options</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/scrollable") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-scrollable">Scrollable</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/compact") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-compact">Compact</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/boxed") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-boxed">Boxed</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/horizontal") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-horizontal">Horizontal</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/preloader") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-preloader">Preloader</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="sidebars" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--layout-sidebar-inactive"></i></span>
                            <span class="menu-text" data-lang="sidebars">Sidebars</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/light") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-light">Light Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/gradient") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-gradient">Gradient Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/gray") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-gray">Gray Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/image") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-image">Image Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/compact") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-compact">Compact Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/on-hover") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-on-hover">On Hover Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/on-hover-active") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-on-hover-active">On Hover Active</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/offcanvas") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-offcanvas">Offcanvas Menu</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="layouts-sidebar-no-icons.html" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-no-icons">No Icons with Lines</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/sidebar/with-lines") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-sidebar-with-lines">Sidebar with Lines</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="topbar" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--layout-bottombar"></i></span>
                            <span class="menu-text" data-lang="topbar">Topbar</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/topbar/dark") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-topbar-dark">Dark Topbar</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/topbar/gray") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-topbar-gray">Gray Topbar</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url("/layouts/topbar/gradient") }}" target="_blank">
                                    <span class="menu-text" data-lang="layouts-topbar-gradient">Gradient Topbar</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-title" data-lang="components">
                        <span>Components</span>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url("/icons/tabler") }}">
                            <span class="menu-icon"><i class="iconify tabler--icons"></i></span>
                            <span class="menu-text" data-lang="icons-tabler">Tabler</span>
                        </a>
                    </li>
                    <li class="menu-title" data-lang="menu-items">
                        <span>Menu Items</span>
                    </li>
                    <li class="menu-item hs-accordion">
                        <a aria-controls="menu-levels" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                            <span class="menu-icon"><i class="iconify tabler--sitemap"></i></span>
                            <span class="menu-text" data-lang="menu-levels">Menu Levels</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                            <li class="menu-item hs-accordion">
                                <a aria-controls="second-level" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                    <span class="menu-text" data-lang="second-level">Second Level</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                    <li class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-text" data-lang="menu-item-1">Item 2.1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-text" data-lang="menu-item-2">Item 2.2</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item hs-accordion">
                                <a aria-controls="second-level-2" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                    <span class="menu-text" data-lang="second-level-2">Second Level</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                    <li class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-text" data-lang="menu-item-3">Item 2.1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item hs-accordion">
                                        <a aria-controls="menu-item-4" aria-expanded="false" class="hs-accordion-toggle menu-link" href="javascript:void(0)">
                                            <span class="menu-text" data-lang="menu-item-4">Item 2.2</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="sub-menu hs-accordion-content hs-accordion-group hidden">
                                            <li class="menu-item">
                                                <a class="menu-link" href="#">
                                                    <span class="menu-text" data-lang="menu-item-5">Item 3.1</span>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a class="menu-link" href="#">
                                                    <span class="menu-text" data-lang="menu-item-6">Item 3.2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link pointer-events-none opacity-50" href="#">
                            <span class="menu-icon"><i class="iconify tabler--ban"></i></span>
                            <span class="menu-text" data-lang="disabled-menu">Disabled Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link !bg-primary !text-white" href="#">
                            <span class="menu-icon"><i class="iconify tabler--star"></i></span>
                            <span class="menu-text !bg-inherit" data-lang="special-menu">Special Menu</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<!-- End Sidebar -->
